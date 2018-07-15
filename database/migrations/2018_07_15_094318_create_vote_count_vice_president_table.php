<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVoteCountVicePresidentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vote_count_vice_president', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('students_id')->refrences('id')->on('students');
            $table->string('students_fullname')->refrences('full_name')->on('students');
            $table->integer('vote');
            $table->integer('candidate_id')->refrences('id')->on('vice_presidents');
            $table->string('candidate_name')->refrences('id')->on('students');
            $table->date('vote_time');
            $table->integer('vote_status');
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
        Schema::dropIfExists('vote_count_vice_president');
    }
}
