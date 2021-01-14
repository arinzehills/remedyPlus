<?php

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
                $table->increments('id');
                $table->unsignedInteger('product_id')->nullable();
                $table->foreign('product_id')->references('id')
                                ->on('products')
                                ->onDelete('cascade');
                $table->integer('user_id')->unsigned()->nullable();
                $table->foreign('user_id')->references('id')
                                        ->on('users')
                                        ->onUpdate('cascade')->onDelete('set null');
                $table->double('amount')->nullable();
                $table->unsignedInteger('quantity')->default(1);
                $table->string('phone')->nullable();
                $table->string('address')->nullable();
                $table->string('state')->nullable();
                $table->string('city')->nullable();
                $table->boolean('is_delivered')->default(false);
                $table->timestamps();
                $table->softDeletes();
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
