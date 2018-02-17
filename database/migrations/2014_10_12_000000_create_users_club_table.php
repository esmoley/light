<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersClubTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users_club', function (Blueprint $table) {
            $table->increments('id');
            $table->string('username');
            $table->string('email')->nullable();
            $table->string('password')->nullable();
            $table->integer('time_left')->default(0);
            $table->timestamp('time_update')->nullable();
            $table->decimal('coins',15,2)->default(0);
            $table->string('studentsid')->nullable();
            $table->integer('club_id');
            $table->timestamps();
            $table->unique(['username','club_id']);
            $table->unique(['email','club_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users_club');
    }
}
