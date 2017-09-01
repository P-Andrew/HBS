<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuestionnairesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $this->down();
        Schema::create('questionnaires', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name',50);
            $table->integer('article_id')->unsigned()->nullable()->index();
            $table->longText('desc');
            $table->boolean('is_sale');
            $table->float('price',10,2)->nullable();
            $table->float('cash_back',10,2)->nullable();
            $table->timestamps();
            $table->foreign('article_id')->references('id')->on('article')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('questionnaires');
    }
}
