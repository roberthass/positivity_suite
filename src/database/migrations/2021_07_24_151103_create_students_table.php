<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('given_name');
            $table->string('photo_url');
            $table->timestamp('last_praise');
            $table->integer('praise_count');
            $table->timestamps();
        });

        Schema::create('student_course', function (Blueprint $table) {
            $table->integer('student_id');
            $table->integer('course_id');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('students');
        Schema::dropIfExists('student_course');
    }
}
