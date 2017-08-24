<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePhonesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('phones', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('person_id')
                ->unsigned()
                ->index();

            $table->string('phone_number', 15);
            $table->boolean('is_whatsapp');
            $table->enum('type', ["HOME","PERSONAL", "WORK"]); 

            $table->timestamps();

            /* Relations */
            $table->foreign('person_id')
                ->references('id')
                ->on('people')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('phones');
    }
}
