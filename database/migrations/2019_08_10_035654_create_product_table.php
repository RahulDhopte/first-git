<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('Name');
            $table->string('sku');
            $table->string('short_description');
            $table->TEXT('long_description');
            $table->FLOAT('price',14,2);
            $table->FLOAT('special_price',14,2);
            $table->ENUM('status',['1','0']);
            $table->integer('quantity');
            $table->string('meta_title');
            $table->TEXT('meta_description');
            $table->TEXT('meta_keywords');
            $table->ENUM('meta_status',['1','0']);
            $table->integer('created_by');
            $table->integer('modify_by');
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
        Schema::dropIfExists('product');
    }
}
