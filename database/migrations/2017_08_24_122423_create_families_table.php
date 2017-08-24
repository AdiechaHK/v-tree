<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFamiliesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('families', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('surname_id')
                ->nullable()
                ->unsigned()
                ->index();
            $table->integer('native_id')
                ->nullable()
                ->unsigned()
                ->index();
            $table->date('visit_date');
            $table->double('lt');
            $table->double('lg');
            $table->timestamps();

            /* Relations */
            $table->foreign('surname_id')
                ->references('id')
                ->on('surnames')
                ->onUpdate('cascade')
                ->onDelete('set null');

            $table->foreign('native_id')
                ->references('id')
                ->on('cities')
                ->onUpdate('cascade')
                ->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('families');
    }
}
