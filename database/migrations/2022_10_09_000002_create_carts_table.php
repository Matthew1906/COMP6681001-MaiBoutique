<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carts', function (Blueprint $table) {
            $table->unsignedBigInteger('userid');
            $table->unsignedBigInteger('productid');
            $table->integer('quantity');
            $table->timestamps();

            $table->primary(['userid','productid']);

            $table->foreign('userid')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('productid')->references('id')->on('products')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('carts');
    }
};
