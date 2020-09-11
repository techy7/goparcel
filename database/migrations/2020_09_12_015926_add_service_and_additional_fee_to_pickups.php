<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddServiceAndAdditionalFeeToPickups extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pickups', function (Blueprint $table) {
            //
            $table->float('additional_fee')->default(0);
            $table->float('item_amount')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pickups', function (Blueprint $table) {
            $table->dropColumn('additional_fee');
            $table->dropColumn('item_amount');
        });
    }
}
