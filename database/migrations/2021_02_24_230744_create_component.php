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
             * RAM: Type
             */
            $table->string('socket');

            /**
             * CPU: Frequency/Clock speed
             * RAM: Memory (GB)
             * SSD: Storage (GB)
             */
            $table->string('capacity');

            $table->string('name');
            $table->string('brand');
            $table->string('model');
            $table->float('price');
            $table->timestamps();

            /**
             * CPU extra fields
             */
            $table->integer('cores')->nullable();
            $table->string('frequency_boost')->nullable();

            /**
             * RAM extra fields
             */
            $table->string('speed')->nullable();

            /**
             * SSD and HDD extra fields
             */
            $table->string('cache')->nullable();
            $table->string('interface')->nullable();
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
