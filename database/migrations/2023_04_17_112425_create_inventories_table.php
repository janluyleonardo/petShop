<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInventoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inventories', function (Blueprint $table) {
            $table->id();
            $table->string('ProductCode')->unique();
            $table->string('ProductName');
            $table->date('EntryDate');
            $table->date('ExpirationDate')->nullable();
            $table->bigInteger('ProductPurchasePrice');
            $table->string('ProductCategory');
            $table->bigInteger('ProductProfit');
            $table->bigInteger('InventoryStock');
            $table->bigInteger('ProductPrice');
            $table->string('ProductImage')->nullable();
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
        Schema::dropIfExists('inventories');
    }
}
