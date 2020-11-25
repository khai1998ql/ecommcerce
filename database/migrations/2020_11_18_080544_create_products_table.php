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
            $table->bigIncrements('id');
            $table->string('product_name')->nullable();
            $table->string('product_code')->nullable();
            $table->integer('category_id')->nullable();
            $table->integer('subcategory_id')->nullable();
            $table->integer('brand_id')->nullable();
            $table->integer('selling_price')->nullable();
            $table->integer('discount_price')->nullable();
            $table->integer('status')->default(1);
            $table->integer('product_content')->nullable();
            $table->integer('product_view')->default(0);;
            $table->integer('product_sold')->default(0);
            $table->string('video_link')->nullable();
            $table->integer('hot_deal')->default(0);
            $table->integer('best_rated')->default(0);
            $table->integer('hot_new')->default(0);
            $table->integer('buyone_getone')->default(0);
            $table->integer('trend')->default(0);
            $table->string('image_one')->nullable();
            $table->string('image_two')->nullable();
            $table->string('image_three')->nullable();
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
        Schema::dropIfExists('products');
    }
}
