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
        Schema::table('Daftarkerjas', function (Blueprint $table) 
        {
            $table->renameColumn('location', 'type');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('_daftarkerjas', function (Blueprint $table) {
            $table->renameColumn('type', 'location');
        });
    }
};
