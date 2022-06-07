<?php

use App\Models\Customer;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id();

            $table->string("code")->unique();
            $table->string("voucher_id")->unique();
            $table->foreignIdFor(Customer::class);
            $table->date("date")->nullable();
            $table->decimal("sub_totals", 8, 4);
            $table->decimal("net_total", 8, 4);
            $table->decimal("carry_fee")->default("0");
            $table->decimal("china_delivery_fee")->default("0");
            $table->decimal("custom_fee")->default("0");
            $table->decimal("delivery_fee")->default("0");

            $table->string("payment_type")->nullable(); // cash or banking
            $table->decimal("currency_exchange_rate")->nullable();

            $table->string("status")->default(1);
            $table->string("created_by")->nullable();
            $table->string("updated_by")->nullable();
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
        Schema::dropIfExists('orders');
    }
}
