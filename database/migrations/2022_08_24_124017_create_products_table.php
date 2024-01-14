<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {


        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->text('description');
            $table->text('summary');
            $table->double('price');
            $table->text('discount_price')->nullable();
            $table->integer('stock_qty');
            $table->text('file')->nullable();
            $table->bigInteger('category_id')->unsigned()->index();
            $table->bigInteger('brand_id')->unsigned()->index();
            $table->enum('status',['Active','Inactive'])->default('Active');
            $table->timestamps();

            $table->foreign('category_id')->references('id')->on('categories')->
            onDelete('cascade')->onUpdate('cascade');
            $table->foreign('brand_id')->references('id')->on('brands')->
            onDelete('cascade')->onUpdate('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
