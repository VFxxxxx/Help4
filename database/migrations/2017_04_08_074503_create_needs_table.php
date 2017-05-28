<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNeedsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('needs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_from')->unsigned();
            $table->integer('id_by')->nullable()->unsigned();
            $table->text('text');
            $table->integer('category_id')->unsigned();
            $table->smallInteger('points')->unsigned();
            $table->enum('status', ['new','execute','closed'])->default('new');
            $table->timestamps();

            $table->foreign('id_from')->references('id')->on('users');
            $table->foreign('id_by')->references('id')->on('users');
            $table->foreign('category_id')->references('id')->on('need_categories');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('needs');
    }
}
