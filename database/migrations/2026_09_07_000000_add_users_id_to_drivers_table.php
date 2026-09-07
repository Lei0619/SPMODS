<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (! Schema::hasColumn('drivers', 'users_id')) {
            Schema::table('drivers', function (Blueprint $table): void {
                $table->foreignId('users_id')
                    ->nullable()
                    ->after('id')
                    ->constrained('users')
                    ->cascadeOnDelete();
            });
        }
    }

    public function down(): void
    {
        if (Schema::hasColumn('drivers', 'users_id')) {
            Schema::table('drivers', function (Blueprint $table): void {
                $table->dropForeign(['users_id']);
                $table->dropColumn('users_id');
            });
        }
    }
};