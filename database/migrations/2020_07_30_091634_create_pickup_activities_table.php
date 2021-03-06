<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePickupActivitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pickup_activities', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pickup_id')->nullable();
            $table->unsignedBigInteger('delivery_status_id')->default(1);
            $table->timestamps();
            $table->index(['pickup_id', 'delivery_status_id'], 'FK');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pickup_activities');
    }
}
