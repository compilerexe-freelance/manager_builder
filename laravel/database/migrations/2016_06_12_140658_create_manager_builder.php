<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateManagerBuilder extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('users', function (Blueprint $table) {
          $table->increments('id');
          $table->string('code');
          $table->string('name');
          $table->string('address');
          $table->string('tel');
          $table->string('email')->unique();
          $table->string('username')->unique();
          $table->string('password');
          $table->string('permission');
          $table->rememberToken();
          $table->timestamps();
      });

      Schema::create('report_user', function (Blueprint $table) {
          $table->increments('id');
          $table->string('title');
          $table->string('detail');
          $table->string('username');
          $table->timestamps();
      });

      Schema::create('project_detail', function (Blueprint $table) {
          $table->increments('id');
          $table->string('title');
          $table->string('detail');
          $table->string('image');
          $table->string('username');
          $table->timestamps();
      });

      Schema::create('list_buy', function (Blueprint $table) {
          $table->increments('id');
          $table->string('code');
          $table->string('detail');
          $table->string('username');
          $table->tinyInteger('state');
          $table->timestamps();
      });

      Schema::create('manage_money', function (Blueprint $table) {
          $table->increments('id');
          $table->string('title');
          $table->string('type_data');
          $table->integer('money');
          $table->string('username');
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
        Schema::drop('users');
    }
}
