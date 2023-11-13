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
      

        Schema::create('a_i_p_o_s', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('zoneId');
            $table->unsignedBigInteger('regId');
            $table->unsignedBigInteger('terId');
            $table->unsignedBigInteger('distributor');
            $table->dateTime('dateTime');
            $table->string('remark');
            $table->json('purchase_order_items'); // JSON column to store the items
        
            $table->foreign('zoneId')->references('id')->on('zones');
            $table->foreign('regId')->references('id')->on('regions');
            $table->foreign('terId')->references('id')->on('territories');
            $table->foreign('distributor')->references('id')->on('user_regs');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('a_i_p_o_s');
    }
};
