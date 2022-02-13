<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubjectMarksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subject_marks', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('mark_id');
            $table->foreign('mark_id')
                ->references('id')->on('marks')
                ->onDelete('cascade');
            $table->unsignedBigInteger('subject_id');
            $table->foreign('subject_id')
                ->references('id')->on('subjects')
                ->onDelete('cascade');
            $table->integer('marks')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('subject_marks');
    }
}
