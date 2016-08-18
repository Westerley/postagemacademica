<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_user')->unsigned();
            $table->integer('id_occupation')->unsigned();
            $table->string('street', 255);
            $table->string('number', 50);
            $table->string('genre', 1);
            $table->string('telephone', 20);
            $table->string('cellphone', 20);
            $table->string('cape', 255);
            $table->string('image', 255)->default('sem_foto.png');
            $table->text('about');
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
        Schema::drop('profiles');
    }
}
