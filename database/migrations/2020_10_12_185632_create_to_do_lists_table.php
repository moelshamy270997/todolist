<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateToDoListsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('to_do_lists', function (Blueprint $table) {
          $table->id();
          $table->enum('status', ['listed', 'inprogress', 'done'])->default('listed');
          $table->string('content');
          $table->timestamps();
          $table->unsignedBigInteger('user_id');
        });

        Schema::table('to_do_lists', function(Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('to_do_lists');
    }
}
