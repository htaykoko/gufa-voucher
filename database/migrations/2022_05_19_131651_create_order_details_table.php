<?php

use App\Models\Order;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_details', function (Blueprint $table) {
            $table->id();

            $table->foreignIdFor(Order::class)->cascadeOnDelete();
            $table->string("product_name", 500)->nullable();
            $table->string("quantity")->nullable();
            $table->string("unit_id")->nullable(); //kg or cbm
            $table->string("unit_qty")->nullable();
            $table->decimal("price")->nullable();
            $table->decimal("amount")->nullable(); //unit_qty * price

            $table->softDeletes();
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
        Schema::dropIfExists('order_details');
    }
}
