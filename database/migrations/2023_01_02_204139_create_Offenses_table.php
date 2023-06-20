<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOffensesTable extends Migration
{

	public function up()
	{
		Schema::create('Offenses', function (Blueprint $table) {
			$table->id();
			$table->integer('offense_number');
			$table->date('offense_date');
			$table->string('license_number', 255);
			$table->string('offender_name', 255);
			$table->string('place_violation', 255);
			$table->string('section', 255);
			$table->string('amount', 255);
			$table->string('Vehicle_number', 255);
			$table->integer('Phone');
			$table->string("password");
			$table->foreignId('Traffic_id')->references("id")->on("trafficPolices")->onDelete('cascade')
				->onUpdate('cascade');
			$table->string('image', 255);
			$table->string('imageProfile')->nullable();
			$table->integer('paidStatut');
			$table->integer('PaidBy');
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('Offenses');
	}
}
