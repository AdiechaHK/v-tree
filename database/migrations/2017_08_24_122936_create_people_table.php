<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePeopleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('people', function (Blueprint $table) {
            $table->increments('id');

            $table->string('firstname');
            $table->string('middlename');
            $table->date('birthdate');
            $table->time('birthtime');
            $table->integer('family_id')
                ->unsigned()
                ->index();
            $table->integer('relation_id')
                ->nullable()
                ->unsigned()
                ->index();
            $table->integer('status_id')
                ->nullable()
                ->unsigned()
                ->index();
            $table->integer('mosal_id')
                ->nullable()
                ->unsigned()
                ->index();
            $table->integer('gautra_id')
                ->nullable()
                ->unsigned()
                ->index();
            $table->integer('education_id')
                ->nullable()
                ->unsigned()
                ->index();


            /* Relations */
            $table->foreign('family_id')
                ->references('id')
                ->on('families')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->foreign('relation_id')
                ->references('id')
                ->on('relations')
                ->onUpdate('cascade')
                ->onDelete('set null');

            $table->foreign('status_id')
                ->references('id')
                ->on('statuses')
                ->onUpdate('cascade')
                ->onDelete('set null');

            $table->foreign('mosal_id')
                ->references('id')
                ->on('surnames')
                ->onUpdate('cascade')
                ->onDelete('set null');

            $table->foreign('gautra_id')
                ->references('id')
                ->on('gautras')
                ->onUpdate('cascade')
                ->onDelete('set null');

            $table->foreign('education_id')
                ->references('id')
                ->on('education')
                ->onUpdate('cascade')
                ->onDelete('set null');

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
        Schema::dropIfExists('people');
    }
}
