<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('police_station_traffic_police', function (Blueprint $table) {
            $table->id();
            $table->foreignId("traffic_police_id")->references("id")->on("trafficPolices")->onDelete("cascade")->onUpdate("cascade");
            $table->foreignId("police_station_id")->references("id")->on("policeStations")->onDelete("cascade")->onUpdate("cascade");
            $table->date("Date");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('police_station__traffic_police');
    }
};
