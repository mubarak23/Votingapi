<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVoteCountFinSecTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vote_count_fin_sec', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('students_id')->references('id')->on('students');
            $table->string('students_fullname')->references('full_name')->on('students');
            $table->integer('vote');
            $table->integer('candidate_id')->references('id')->on('students');
            $table->string('candidate_fullname')->references('full_name')->on('students');
            $table->date('vote_time');
            $table->integer('vote_count');
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
        Schema::dropIfExists('vote_count_fin_sec');
    }
}
