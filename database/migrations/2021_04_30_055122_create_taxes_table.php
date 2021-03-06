<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTaxesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('taxes', function (Blueprint $table) {
            $table->id();
            $table->string('tax_block');
            $table->string('tax_number');
            $table->string('year');
            $table->string('taxpayer_name');
            $table->string('taxpayer_address');
            $table->string('rt');
            $table->string('rw');
            $table->string('taxobject_address');
            $table->string('class');
            $table->integer('object_large');
            $table->integer('object_value');
            $table->integer('unit_value');
            $table->integer('building_large');
            $table->integer('building_value');
            $table->integer('unit_building_value');
            $table->integer('value');
            $table->boolean('ispayed');
            $table->integer('ref');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('taxes');
    }
}
