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
		Schema::table('users', function (Blueprint $table) {
			$table->string('otp')->after('password');
			$table->integer('role_id')->after('password');
			$table->dropColumn('role');
		});
	}

	/**
		* Reverse the migrations.
		*
		* @return void
		*/
	public function down()
	{
		Schema::table('users', function (Blueprint $table) {
			$table->dropColumn('otp');
			$table->dropColumn('role_id');
			$table->integer('role')->after('password');
		});
	}
};
