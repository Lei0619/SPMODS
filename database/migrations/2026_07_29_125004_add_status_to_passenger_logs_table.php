<?php

use App\Models\Trip;
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
        if (! Schema::hasTable('passenger_logs')) {
            return;
        }

        Schema::table('passenger_logs', function (Blueprint $table) {
            if (! Schema::hasColumn('passenger_logs', 'trip_id')) {
                $table->foreignIdFor(Trip::class)->constrained()->cascadeOnDelete();
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        if (! Schema::hasTable('passenger_logs')) {
            return;
        }

        Schema::table('passenger_logs', function (Blueprint $table) {
            $table->dropForeign(['trip_id']);
        });

        Schema::table('passenger_logs', function (Blueprint $table) {
            if (Schema::hasColumn('passenger_logs', 'trip_id')) {
                $table->dropColumn('trip_id');
            }
        });
    }
};
