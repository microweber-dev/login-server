<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmailTokensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('email_tokens', function (Blueprint $table) {
            $table->integer('user_id')->unsigned();
            $table->increments('id');
            $table->string('email');
            $table->uuid('token')->unique();
            $table->boolean('confirmed')->default(false);
            $table->boolean('expired')->default(false);
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
        Schema::dropIfExists('email_tokens');
    }
}
