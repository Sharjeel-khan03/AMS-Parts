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
		Schema::create('vendors', function (Blueprint $table) {
			$table->id();
			$table->string('name');
			$table->string('address')->nullable();
			$table->string('location')->nullable();
			$table->string('company_name')->nullable();
			$table->string('vendor_phone')->nullable();
			$table->string('vendor_website')->nullable();
			$table->string('vendor_net')->nullable();
			$table->string('vendor_transport')->nullable();
			$table->string('vendor_ect')->nullable();
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
		Schema::dropIfExists('vendors');
	}
};
