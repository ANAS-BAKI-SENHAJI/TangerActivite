<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
                $table->increments('id');
                $table->string('name');
                $table->string('phone')->default('0000000000');
                $table->string('city')->default('City_By_Default');
                $table->string('country')->default('Country_By_Default');
                $table->integer('age')->default('18');
                $table->string('email')->unique();
                $table->boolean('is_admin')->default(false);
                $table->string('password');
                $table->rememberToken();
                $table->timestamps();
                $table->softDeletes();
        });
    }

    
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
