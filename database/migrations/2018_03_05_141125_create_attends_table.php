<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAttendsTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('attends', function (Blueprint $table) {
            $table->increments('id');
            $table->string('user_code');
            $table->enum('state', ['IN', 'OUT']);
            $table->text('comment')->nullable();
            $table->timestamps();
        });

        Schema::table('attends', function($table) {
            $table->foreign('user_code')->references('code')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('attends');
    }

}
