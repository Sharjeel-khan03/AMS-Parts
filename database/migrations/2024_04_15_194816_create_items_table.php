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
		Schema::create('items', function (Blueprint $table) {
			$table->id();
			$table->string('name');
			$table->string('slug');
			$table->text('description');
			$table->string('sku')->nullable();
			$table->string('upc')->nullable();
			$table->string('part_no');
			$table->float('unit_price');
			// $table->integer('currency_id');
			$table->boolean('status');
			$table->timestamps();
            $table->softDeletes();
		});
	}

	/**
		* Reverse the migrations.
		*
		* @return void
		*/
	public function down()
	{
		Schema::dropIfExists('items');
	}
};
