<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 100);
            $table->string('slug', 100);
            $table->integer('category_id')->unsigned()->nullable();
            $table->text('image');
            $table->integer('evaluate_id')->default(0);
            $table->integer('view')->default(0);
            $table->integer('quantity')->default(0);
            $table->integer('price')->default(0);
            $table->text('detail');
            $table->text('description');
            $table->boolean('status')->default(0);
            $table->timestamps();
        });
        Schema::table('products', function (Blueprint $table) {
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
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
