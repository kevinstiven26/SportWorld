<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFieldValueFieldProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('field_value_field_product', function (Blueprint $table) {
            $table->unsignedBigInteger('field_value_id');
            $table->unsignedBigInteger('field_product_id');

            $table->foreign('field_value_id')->references('id')->on('field_values');
            $table->foreign('field_product_id')->references('id')->on('field_products');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('field_value_field_product');
    }
}
