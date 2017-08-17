<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $this->down();
        Schema::create('article',function(Blueprint$table){
            $table->increments('id');
            $table->integer('categories_id')->unsigned()->nullable()->index();
            $table->string('title');
            $table->string('summary');
            $table->string('thumb');
            $table->tinyInteger('attr')->unsigned()->default(0);
            $table->integer('share_gift')->default(0);
            $table->longText('content');
            $table->integer('skim_num')->unsigned()->default(0);
            $table->integer('praise')->default(0);
            $table->integer('order')->default(0);
            $table->boolean('is_recommend')->default(0);
            $table->timestamps();
            $table->foreign('categories_id')->references('id')->on('categories')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('article');
    }
}
