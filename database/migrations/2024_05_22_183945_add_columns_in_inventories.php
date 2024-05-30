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
        Schema::table('inventories', function (Blueprint $table) {
            $table->string('part_no')->nullable()->after('item_id');
            $table->string('location');
        });
        DB::statement('ALTER TABLE inventories MODIFY COLUMN item_id INT(11) NULL');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('inventories', function (Blueprint $table) {
            $table->dropColumn('part_no');
            $table->dropColumn('location');
        });
        DB::statement('ALTER TABLE inventories MODIFY COLUMN item_id INT(11) NOT NULL');
    }
};
