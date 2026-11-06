<?php

namespace App\Http\Controllers;

use App\Http\Requests\ApplicationDocument\StoreApplicationsDocumentRequest;
use App\Http\Requests\ApplicationDocument\UpdateApplicationsDocumentRequest;
use App\Models\ApplicationsDocument;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\JsonResponse;
use Inertia\Inertia;
use Inertia\Response;

class ApplicationsDocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    /** @return Collection<int, ApplicationsDocument> */
    public function index(): Collection
    {
        return ApplicationsDocument::all();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): void
    {
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreApplicationsDocumentRequest $request): ApplicationsDocument
    {
        return ApplicationsDocument::create($request->validated());
    }

    /**
     * Display the specified resource.
     */
    public function show(ApplicationsDocument $applicationsDocument): Response
    {
        return Inertia::render('admin/applications-documents/show', [
            'applicationsDocument' => $applicationsDocument,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ApplicationsDocument $applicationsDocument): void
    {
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateApplicationsDocumentRequest $request, ApplicationsDocument $applicationsDocument): JsonResponse
    {
        $applicationsDocument->update($request->validated());

        return response()->json($applicationsDocument, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ApplicationsDocument $applicationsDocument): JsonResponse
    {
        $applicationsDocument->delete();

        return response()->json(['message' => 'ApplicationsDocument deleted successfully'], 200);
    }
}
