<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTaxsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('taxs', function (Blueprint $table) {
            $table->string('id',100)->primary();
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
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('taxs');
    }
}
