<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps(true);
            $table->integer('customer_id');
            $table->integer('total_price');
            $table->string('ship_name');
            $table->string('ship_address');
            $table->string('ship_phone');
            $table->integer('clientId');
            $table->integer('status')->default(1); // -1. huỷ | 0. đang chờ xử lý | 1. đã nhận đơn hàng | 2. hoàn thành.
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
