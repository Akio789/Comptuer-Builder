<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComponent extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('components', function (Blueprint $table) {
            $table->id();
            $table->string('type');

            /**
             * CPU: Chipset
             */
            $table->string('socket');

            $table->string('name');
            $table->string('brand');
            $table->string('model');
            $table->float('price');
            $table->string('capacity');
            $table->timestamps();

            /**
             * CPU extra fields
             */
            $table->integer('cores')->nullable();
            $table->string('frequency_boost')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
