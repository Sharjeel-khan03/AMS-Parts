<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
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
		DB::statement('ALTER TABLE purchase_orders ADD COLUMN sales_tax VARCHAR(255) AFTER ship_to');
		DB::statement('ALTER TABLE purchase_orders ADD COLUMN shipping_cost VARCHAR(255) AFTER ship_to');
		DB::statement('ALTER TABLE purchase_orders ADD COLUMN sub_total VARCHAR(255) AFTER ship_to');
		DB::statement('ALTER TABLE purchase_orders ADD COLUMN comments VARCHAR(255) AFTER ship_to');
		DB::statement('ALTER TABLE purchase_orders ADD COLUMN terms VARCHAR(255) AFTER ship_to');
		DB::statement('ALTER TABLE purchase_orders ADD COLUMN ship_via VARCHAR(255) AFTER ship_to');
		DB::statement('ALTER TABLE purchase_orders ADD COLUMN requested_by VARCHAR(255) AFTER ship_to');
		DB::statement('ALTER TABLE purchase_orders ADD COLUMN delivery_date VARCHAR(255) AFTER ship_to');

		DB::statement('ALTER TABLE purchase_order_lines ADD COLUMN `status` VARCHAR(255) AFTER quantity');
		DB::statement('ALTER TABLE purchase_order_lines ADD COLUMN uom VARCHAR(255) AFTER quantity');
		DB::statement('ALTER TABLE purchase_order_lines ADD COLUMN cost VARCHAR(255) AFTER quantity');
		DB::statement('ALTER TABLE purchase_order_lines ADD COLUMN receive_qty VARCHAR(255) AFTER quantity');
	}

	/**
		* Reverse the migrations.
		*
		* @return void
		*/
	public function down()
	{
		DB::statement('ALTER TABLE purchase_orders DROP COLUMN sales_tax');
		DB::statement('ALTER TABLE purchase_orders DROP COLUMN shipping_cost');
		DB::statement('ALTER TABLE purchase_orders DROP COLUMN sub_total');
		DB::statement('ALTER TABLE purchase_orders DROP COLUMN comments');
		DB::statement('ALTER TABLE purchase_orders DROP COLUMN terms');
		DB::statement('ALTER TABLE purchase_orders DROP COLUMN ship_via');
		DB::statement('ALTER TABLE purchase_orders DROP COLUMN requested_by');
		DB::statement('ALTER TABLE purchase_orders DROP COLUMN delivery_date');

		DB::statement('ALTER TABLE purchase_order_lines DROP COLUMN `status`');
		DB::statement('ALTER TABLE purchase_order_lines DROP COLUMN uom');
		DB::statement('ALTER TABLE purchase_order_lines DROP COLUMN cost');
		DB::statement('ALTER TABLE purchase_order_lines DROP COLUMN receive_qty');
	}
};
