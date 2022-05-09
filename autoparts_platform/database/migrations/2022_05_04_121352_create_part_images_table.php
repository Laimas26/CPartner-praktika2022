<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePartImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('part_images', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('part_id')->nullable();
            $table->string('path');
            $table->timestamps();

            $table->foreign('part_id')->references('id')->on('vehicle_parts')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('part_images');
    }
}
