<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBlogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blogs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title')->comment('标题');
            $table->integer('user_id')->comment('作者');
            $table->text('content');
//            $table->string('abstract')->comment('文章摘要');
//            $table->integer('blog_category_id')->default(0);
            $table->string('cover')->comment('封面')->nullable();
            $table->integer('views')->comment('点击数')->default(0);
//            $table->integer('order_id')->comment('商品')->nullable();
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
        Schema::dropIfExists('blogs');
    }
}
