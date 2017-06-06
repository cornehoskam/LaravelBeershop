<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table)
        {
            $table->increments('id')->unique();
            $table->integer('parent_category')->unsigned()->nullable();
            $table->foreign('parent_category')->references('id')->on('categories')->onDelete('set null');;
            $table->integer('parent_sub_category')->unsigned()->nullable();
            $table->foreign('parent_sub_category')->references('id')->on('sub_categories')->onDelete('set null');;
            $table->string('name')->unique();
            $table->longText('description');
            $table->double('price');
            $table->double('alcohol_contents');
            $table->integer('contents_ml');
            $table->string('image_url');
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
