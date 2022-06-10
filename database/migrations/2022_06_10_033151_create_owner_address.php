<?php

use App\Models\OwnerAddress;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOwnerAddress extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('owner_addresses', function (Blueprint $table) {
            $table->id();
            $table->text("address1");
            $table->text("address2");
            $table->timestamps();
        });

        OwnerAddress::create([
            'address1' => 'Test Address',
            'address2' => 'Test Address2',
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('owner_addresses');
    }
}
