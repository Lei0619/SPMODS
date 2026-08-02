<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('vehicles', function (Blueprint $table) {
            $table->id();
            $table->string('plate_number')->default('ABC123')->unique();
            $table->string('vehicle_type')->default('jeepney');
            $table->integer('max_capacity')->default(20);
            $table->foreignId('driver_id')
                ->default(1)
                ->constrained('drivers')
                ->cascadeOnDelete();
            $table->foreignId('route_id')
                ->default(1)
                ->constrained('transport_routes')
                ->cascadeOnDelete();
            $table->enum('status', [
                'available',
                'on_trip',
                'maintenance',
                'offline',
            ])->default('available');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('vehicles');
    }
};
