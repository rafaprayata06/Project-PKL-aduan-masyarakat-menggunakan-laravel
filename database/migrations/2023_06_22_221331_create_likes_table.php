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
        Schema::create('suka', function (Blueprint $table) {
            $table->id('id_like');
            $table->char('nik');
            $table->unsignedBigInteger('post_id');
            $table->string('like')->default(1);
            $table->timestamps();

            $table->foreign('nik')->references('nik')->on('masyarakat')->onDelete('cascade');
            $table->foreign('post_id')->references('id_post')->on('berita');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('suka');
    }
};
