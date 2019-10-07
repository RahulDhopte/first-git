<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductAttributesAssocTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_attributes_assoc', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('product_id')->unsigned()->index()->foreign()->references("id")->on("product")->onDelete("cascade");
            $table->integer('product_attribute_id')->unsigned()->index()->foreign()->references("id")->on("product_attributes")->onDelete("cascade");
            $table->integer('product_attribute_value_id')->unsigned()->index()->foreign()->references("id")->on("product_attributes_values")->onDelete("cascade");
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
        Schema::dropIfExists('product_attributes_assoc');
    }
}
