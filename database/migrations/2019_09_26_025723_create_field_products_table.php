<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFieldProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('field_products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name',75);
            $table->unsignedBigInteger('field_type_id');

            $table->foreign('field_type_id')->references('id')->on('field_types');
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
        Schema::dropIfExists('field_products');
    }
}
