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
        Schema::create('sliders', function (Blueprint $table) {
            $table->id();
            $table->boolean('is_active')->default(true);
            $table->string('crumb');
            $table->string('judul');
            $table->string('subjudul');
            $table->text('image_path');
            $table->timestamps();
        });

        Schema::create('sales', function (Blueprint $table) {
            $table->id();
            $table->foreignId('slider_id')->constrained('sliders')->onDelete('cascade');
            $table->string('nama');
            $table->string('nama_produk');
            $table->text('image_path');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sales');
        Schema::dropIfExists('sliders');
    }
};
