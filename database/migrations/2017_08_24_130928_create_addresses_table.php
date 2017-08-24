<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('addresses', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('person_id')
                ->nullable()
                ->unsigned()
                ->index();
            $table->text('text');
            $table->string('landmark');
            $table->integer('city_id')
                ->nullable()
                ->unsigned()
                ->index();
            $table->integer('district_id')
                ->nullable()
                ->unsigned()
                ->index();
            $table->bigInteger('pincode');
            $table->timestamps();

            /* Relations */
            $table->foreign('person_id')
                ->references('id')
                ->on('people')
                ->onUpdate('cascade')
                ->onDelete('set null');

            $table->foreign('city_id')
                ->references('id')
                ->on('cities')
                ->onUpdate('cascade')
                ->onDelete('set null');

            $table->foreign('district_id')
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
        Schema::dropIfExists('addresses');
    }
}
