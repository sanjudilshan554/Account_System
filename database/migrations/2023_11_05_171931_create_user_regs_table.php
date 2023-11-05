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
        Schema::create('user_regs', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('nic');
            $table->string('address');
            $table->string('mobile');
            $table->string('email');
            $table->string('gender');
            $table->unsignedBigInteger('territory');
            $table->string('userName');
            $table->string('password');
            $table->foreign('territory')->references('id')->on('territories');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_regs');
    }
};
