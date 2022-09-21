<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
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
            $table->string('short_description')->nullable();
            $table->string('description');
            $table->decimal('regular_price');
            $table->decimal('sale_price')->nullable();
            $table->string('SKU');
            $table->enum('stok_status',['instock','outofstock']);
            $table->boolean('featured')->default(false);
            $table->unsignedInteger('quantity')->default(10);
            $table->string('image')->nullable();
            $table->text('images')->nullable();
            $table->bigInteger('catagory_id')->unsigned()->nullable();
            $table->timestamps();
            $table->foreign('catagory_id')->references('id')->on('catagories')->onDelete('cascade');

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
};
