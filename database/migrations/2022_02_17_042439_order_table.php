<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class OrderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('order_no', 10);
            $table->string('payment_type', 20);
            $table->string('order_status', 10)->comment('0 = Failed', '1 = Pending', '2 = Accepted', '3 = Out For Deliver', '4 = Delivered');
            $table->string("name", 50);
            $table->string("mobile_no", 10);
            $table->text("address");
            $table->decimal("shipping_charge", 6, 2);
            $table->decimal("sub_total", 6, 2);
            $table->decimal("total_amount", 6, 2);
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
        Schema::dropIfExists('orders');
    }
}
