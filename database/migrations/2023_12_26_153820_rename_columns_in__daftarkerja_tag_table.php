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
        Schema::table('daftarkerja_tag', function (Blueprint $table)
        {
            $table->renameColumn('listing_id', 'daftarkerja_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('daftarkerja_tag', function (Blueprint $table) 
        {
            $table->renameColumn('daftarkerja_id', 'listing_id');
        });
    }
};
