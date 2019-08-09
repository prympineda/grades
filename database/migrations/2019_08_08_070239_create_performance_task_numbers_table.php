<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePerformanceTaskNumbersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('performance_task_numbers', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('quarter_id')->nullable();
            $table->integer('semester_id')->nullable();
            $table->integer('section_id');
            $table->integer('subject_id');
            $table->integer('number')->default(0);
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
        Schema::dropIfExists('performance_task_numbers');
    }
}
