<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUnitsTable extends Migration
{
    public function up()
    {
        Schema::create('units', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('unit_name');
            $table->string('unit_code');
            $table->date('unit_checkin');
            $table->date('unit_checkout');
            $table->string('unit_lock');
            $table->string('unit_status');
            $table->longText('unit_connectivity')->nullable();
            $table->string('unit_parking')->nullable();
            $table->boolean('oven')->default(0)->nullable();
            $table->boolean('laundry')->default(0)->nullable();
            $table->boolean('dishwasher')->default(0)->nullable();
            $table->boolean('coffee_machine')->default(0)->nullable();
            $table->boolean('fireplace')->default(0)->nullable();
            $table->boolean('tv')->default(0)->nullable();
            $table->boolean('iron')->default(0)->nullable();
            $table->boolean('private_entrance')->default(0)->nullable();
            $table->boolean('outdoor_sitting_area')->default(0)->nullable();
            $table->boolean('office_desk')->default(0)->nullable();
            $table->boolean('balcony')->default(0)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
