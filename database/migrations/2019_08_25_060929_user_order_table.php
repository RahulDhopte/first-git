<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UserOrderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_order', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('user_id')->unsigned()->index()->foreign()->references("id")->on("users")->onDelete("cascade");
            $table->integer('billing_address_id');
            $table->integer('shipping_address_id');
            $table->integer('shipping_method');
            $table->string('AWB_NO');
            $table->integer('payment_gateway_id');
            $table->string('transaction_id');
            $table->string('Status');
            $table->FLOAT('grand_total',14,2);
            $table->FLOAT('shipping_charges',14,2);
            $table->integer('coupon_id')->unsigned()->index()->foreign()->references("id")->on("coupons")->onDelete("cascade");
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
        Schema::dropIfExists('user_order');
    }
}
