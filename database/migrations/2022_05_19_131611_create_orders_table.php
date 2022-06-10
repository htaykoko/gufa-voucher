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
            $table->double("sub_totals")->default(0);
            $table->double("net_total")->default(0);
            $table->double("carry_fee")->default("0");
            $table->double("china_delivery_fee")->default("0");
            $table->double("custom_fee")->default("0");
            $table->double("delivery_fee")->default("0");

            $table->string("payment_type")->nullable(); // cash or banking
            $table->double("currency_exchange_rate")->nullable();
            $table->string("currency_exchange_unit")->default("yum"); //kyaw or yum

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
