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
             * SSD: Socket
             * HDD: Socket
             * Cooler: Socket
             */
            $table->string('socket');

            /**
             * What capacity means for every component type
             * 
             * CPU: Frequency/Clock speed
             * RAM: Memory (GB)
             * SSD: Storage (GB)
             * Cooler: Fans RPM
             */
            $table->string('capacity');

            $table->string('name');
            $table->string('brand');
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

            /**
             * Cooler extra fields
             */
            $table->string('noise')->nullable();
            $table->string('size')->nullable();
            $table->string('radiator')->nullable();
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
