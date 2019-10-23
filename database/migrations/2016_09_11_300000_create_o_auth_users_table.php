<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOAuthUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('oauth_users', function (Blueprint $table) {
            $table->integer('user_id')->unsigned()->nullable();
            $table->integer('provider_id')->unsigned();
            $table->string('id');
            $table->string('nickname')->nullable();
            $table->string('name')->nullable();
            $table->string('email')->nullable();
            $table->text('avatar')->nullable();
            $table->text('token');
            $table->text('refresh_token')->nullable();
            $table->string('expires_in')->nullable();
            $table->text('token_secret')->nullable();
            $table->timestamps();
            $table->primary(['provider_id', 'id']);
            $table->unique(['user_id', 'provider_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('oauth_users');
    }
}
