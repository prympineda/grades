<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExamScoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exam_scores', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('quarter_id')->nullable();
            $table->integer('semester_id')->nullable();
            $table->integer('section_id');
            $table->integer('subject_id');
            $table->integer('exam_number');
            $table->integer('exam_id');
            $table->integer('student_id');
            $table->integer('score');
            $table->integer('total');
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
        Schema::dropIfExists('exam_scores');
    }
}
