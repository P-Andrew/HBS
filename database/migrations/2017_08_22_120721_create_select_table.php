<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSelectTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $this->down();
        Schema::create('select', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('question_id')->unsigned()->nullable()->index();
            $table->string('select_content');
            $table->timestamps();
            $table->foreign('question_id')->references('id')->on('question')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('select');
    }
}
