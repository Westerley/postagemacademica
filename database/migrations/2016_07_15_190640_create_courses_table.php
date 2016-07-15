<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 200);
            $table->timestamps();
        });

        Schema::table('posts', function($table)
        {
            $table->foreign('id_profile')->references('id')->on('profiles')->onDelete('cascade');
            $table->foreign('id_course')->references('id')->on('courses')->onDelete('cascade');
        });

        Schema::table('profiles', function($table)
        {
            $table->foreign('id_user')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('id_occupation')->references('id')->on('occupations')->onDelete('cascade');
        });

        Schema::table('registrations', function($table)
        {
            $table->foreign('id_profile')->references('id')->on('profiles')->onDelete('cascade');
            $table->foreign('id_courses')->references('id')->on('courses')->onDelete('cascade');
        });

        Schema::table('rates', function($table)
        {
            $table->foreign('id_profile')->references('id')->on('profiles')->onDelete('cascade');
            $table->foreign('id_post')->references('id')->on('posts')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('courses');
    }
}
