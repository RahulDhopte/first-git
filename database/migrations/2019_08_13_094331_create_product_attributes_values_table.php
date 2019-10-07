<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductAttributesValuesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_attributes_values', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('product_attribute_id')->unsigned()->index()->foreign()->references("id")->on("product_attributes")->onDelete("cascade");
            $table->string('Value');
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
        Schema::dropIfExists('product_attributes_values');
    }
}
