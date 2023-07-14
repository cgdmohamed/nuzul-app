<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToUnitsTable extends Migration
{
    public function up()
    {
        Schema::table('units', function (Blueprint $table) {
            $table->unsignedBigInteger('unit_district_id')->nullable();
            $table->foreign('unit_district_id', 'unit_district_fk_8752364')->references('id')->on('locations');
            $table->unsignedBigInteger('booked_by_id')->nullable();
            $table->foreign('booked_by_id', 'booked_by_fk_8106264')->references('id')->on('users');
            $table->unsignedBigInteger('team_id')->nullable();
            $table->foreign('team_id', 'team_fk_8106261')->references('id')->on('teams');
        });
    }
}
