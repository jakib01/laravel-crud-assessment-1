<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('todo_apis', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('userId')->unsigned()->nullable();
            $table->string('title')->nullable();
            $table->boolean('completed')->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('userId')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('todo_apis');
    }
};
