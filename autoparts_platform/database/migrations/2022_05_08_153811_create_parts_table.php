<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePartsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parts', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('model_id')->nullable();
            $table->uuid('user_id')->nullable();
            $table->uuid('category_id')->nullable();
            $table->string('name');
            $table->date('make_years');
            $table->float('price');
            $table->string('image_path', 150);
            $table->string('part_wear');
            $table->string('identifier_number')->nullable();
            $table->timestamps();

            $table->foreign('model_id')->references('id')->on('vehicle_models')->onDelete('cascade');
            $table->foreign('user_id')->references('user_id')->on('sellers')->onDelete('cascade');
            $table->foreign('category_id')->references('id')->on('parts_categories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('parts');
    }
}
