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
        Schema::table('drivers', function (Blueprint $table) {
            $table->unsignedBigInteger('driver_app_id')->nullable()->after('id');
            $table->foreign('driver_app_id')->references('id')->on('driver_apps')->onDelete('set null');
            $table->unique('driver_app_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('drivers', function (Blueprint $table) {
            $table->dropForeign('drivers_driver_app_id_foreign');
            $table->dropUnique('drivers_driver_app_id_unique');
            $table->dropColumn('driver_app_id');
        });
    }
};