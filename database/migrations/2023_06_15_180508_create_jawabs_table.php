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
        Schema::create('jawab', function (Blueprint $table) {
            $table->id('id_jawab');
            $table->unsignedBigInteger('id_kepuasan');
            $table->unsignedBigInteger('user_id');
            $table->dateTime('tgl_jawab');
            $table->char('jawab');
            $table->enum('status',['belum','lihat']);
            $table->timestamps();

            $table->foreign('id_kepuasan')->references('id_kepuasan')->on('rating')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jawab');
    }
};
