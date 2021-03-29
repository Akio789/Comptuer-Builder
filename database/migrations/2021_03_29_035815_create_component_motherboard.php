<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComponentMotherboard extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('component_motherboard', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('motherboard_id')->constrained()->onDelete('cascade');
            $table->foreignId('component_id')->constrained()->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('component_motherboard');
    }
}
