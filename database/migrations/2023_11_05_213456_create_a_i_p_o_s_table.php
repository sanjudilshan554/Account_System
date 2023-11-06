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
            $table->unsignedBigInteger('skuCode');
            $table->string('skuName');
            $table->double('unitPrice');
            $table->integer('qty');
            $table->integer('customQty');
            $table->string('units');
            $table->double('totalPrice');
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
