<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdditionalFieldsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('additional_fields', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('value');
            $table->unsignedBigInteger('product_id');
            $table->unsignedBigInteger('field_product_id');
            $table->unsignedBigInteger('order_id');

            $table->foreign('product_id')->references('id')->on('products');
            $table->foreign('field_product_id')->references('id')->on('field_products');
            $table->foreign('order_id')->references('id')->on('orders');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('additional_fields');
    }
}
