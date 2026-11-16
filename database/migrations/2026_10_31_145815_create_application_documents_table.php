<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('application_documents', function (Blueprint $table) {
            $table->id();
            $table->foreignId('driver_app_id')->constrained('driver_apps')->onDelete('cascade');
            $table->string('google_form_response_id')->nullable()->unique();
            $table->string('license_front_image_path');
            $table->string('license_back_image_path');
            $table->string('supporting_document_path')->nullable();
            $table->boolean('privacy_consent')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('application_documents');
    }
};
