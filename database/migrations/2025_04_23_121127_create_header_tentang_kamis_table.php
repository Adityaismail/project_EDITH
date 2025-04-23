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
        Schema::create('header_tentang_kamis', function (Blueprint $table) {
            $table->id();
            $table->boolean('is_active')->default(true);
            $table->string('header');
            $table->string('subheader');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('header_tentang_kamis');
    }
};
