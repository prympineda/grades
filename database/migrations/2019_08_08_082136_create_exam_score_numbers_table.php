<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExamScoreNumbersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exam_score_numbers', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('quarter_id')->nullable();
            $table->integer('semester_id')->nullable();
            $table->integer('section_id');
            $table->integer('subject_id');
            $table->integer('number')->default(0);
            $table->integer('total'); // highes number of score
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
        Schema::dropIfExists('exam_score_numbers');
    }
}
