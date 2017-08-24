<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuestionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $this->down();
        Schema::create('question', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('questionnaire_id')->unsigned()->nullable()->index();
            $table->string('question');
            $table->boolean('is_need');
            $table->enum('type',['text','select','time','data']);
            $table->timestamps();
            $table->foreign('questionnaire_id')->references('id')->on('questionnaires')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('question');
    }
}
