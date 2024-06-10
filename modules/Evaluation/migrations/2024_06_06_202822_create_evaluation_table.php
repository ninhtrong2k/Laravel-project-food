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
        Schema::create('evaluations', function (Blueprint $table) {
            $table->increments('id'); // Khóa chính tự động tăng
            $table->unsignedInteger('user_id')->nullable(); // ID người dùng (khóa ngoại)
            $table->unsignedInteger('product_id')->nullable();
            $table->string('email'); // Email
            $table->text('content'); // Nội dung đánh giá
            $table->integer('star'); // Số sao đánh giá
            $table->timestamps(); // created_at và updated_at
        });
        Schema::table('evaluations', function (Blueprint $table) {
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('evaluations');
    }
};
