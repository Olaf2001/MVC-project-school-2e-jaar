<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStoreRulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('store_rules', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('store_id');
            $table->foreign('store_id')
                ->references('id')->on('stores')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->unsignedInteger('product_id');
            $table->foreign('product_id')
                ->references('id')->on('products')
                ->onDelete('cascade')
                ->onUpdate('cascade');
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
        Schema::dropIfExists('storeRules');
    }
}
