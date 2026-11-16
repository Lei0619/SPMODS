<?php

namespace App\Http\Controllers\Api;

use App\Events\DriverApplicationSubmitted;
use App\Http\Controllers\Controller;
use App\Models\ApplicationsDocument;
use App\Models\DriverApp;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use RuntimeException;
use Throwable;

class GoogleFormApplicationController extends Controller
{
    /**
     * Store a driver application submitted through Google Forms.
     */
    public function store(Request $request): JsonResponse
    {
        $configuredToken = (string) config('services.google-forms.token');
        $providedToken = (string) $request->bearerToken();

        if ($configuredToken === '') {
            return response()->json([
                'message' => 'Google Forms integration is not configured.',
            ], 503);
        }

        if ($providedToken === '' || ! hash_equals($configuredToken, $providedToken)) {
            return response()->json([
                'message' => 'Unauthenticated.',
            ], 401);
        }

        $responseId = $request->validate([
            'google_form_response_id' => ['required', 'uuid'],
        ])['google_form_response_id'];

        $existingDocument = ApplicationsDocument::query()
            ->where('google_form_response_id', $responseId)
            ->with('driverApp')
            ->first();

        if ($existingDocument !== null) {
            return response()->json([
                'message' => 'Driver application was already received.',
                'application_id' => $existingDocument->driver_app_id,
                'response_id' => $responseId,
            ]);
        }

        $validated = $request->validate([
            'full_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'phone_number' => ['required', 'string', 'max:20', 'unique:driver_apps,phone_number'],
            'license_number' => ['required', 'string', 'max:255', 'unique:driver_apps,license_number'],
            'license_type' => ['required', 'string', 'max:255'],
            'license_expiry_date' => ['required', 'date'],
            'privacy_consent' => ['required', 'accepted'],
            'license_front_image' => ['required', 'file', 'mimes:jpg,jpeg,png', 'max:2048'],
            'license_back_image' => ['required', 'file', 'mimes:jpg,jpeg,png', 'max:2048'],
            'supporting_document' => ['nullable', 'file', 'mimes:jpg,jpeg,png,pdf', 'max:2048'],
        ]);

        $disk = Storage::disk('local');
        $storedPaths = [];

        try {
            foreach ([
                'license_front_image' => 'license_front_image_path',
                'license_back_image' => 'license_back_image_path',
                'supporting_document' => 'supporting_document_path',
            ] as $input => $pathField) {
                if (! isset($validated[$input])) {
                    $validated[$pathField] = null;

                    continue;
                }

                $path = $validated[$input]->store('driver-applications', 'local');

                if ($path === false) {
                    throw new RuntimeException("Unable to store {$input}.");
                }

                $storedPaths[] = $path;
                $validated[$pathField] = $path;
            }

            $driverApp = DB::transaction(function () use ($validated, $responseId): DriverApp {
                $driverApp = DriverApp::query()->create([
                    'full_name' => $validated['full_name'],
                    'email' => $validated['email'],
                    'phone_number' => $validated['phone_number'],
                    'license_number' => $validated['license_number'],
                    'license_type' => $validated['license_type'],
                    'license_expiry_date' => $validated['license_expiry_date'],
                ]);

                $driverApp->applicationsDocuments()->create([
                    'google_form_response_id' => $responseId,
                    'license_front_image_path' => $validated['license_front_image_path'],
                    'license_back_image_path' => $validated['license_back_image_path'],
                    'supporting_document_path' => $validated['supporting_document_path'],
                    'privacy_consent' => true,
                ]);

                return $driverApp;
            });
        } catch (Throwable $exception) {
            $disk->delete($storedPaths);

            $existingDocument = ApplicationsDocument::query()
                ->where('google_form_response_id', $responseId)
                ->first();

            if ($existingDocument !== null) {
                return response()->json([
                    'message' => 'Driver application was already received.',
                    'application_id' => $existingDocument->driver_app_id,
                    'response_id' => $responseId,
                ]);
            }

            throw $exception;
        }

        DriverApplicationSubmitted::dispatch($driverApp);

        return response()->json([
            'message' => 'Driver application received.',
            'application_id' => $driverApp->id,
            'response_id' => $responseId,
        ], 201);
    }
}
