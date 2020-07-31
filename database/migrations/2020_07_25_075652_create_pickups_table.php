<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePickupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pickups', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->timestamp('pickup_date')->nullable();
            $table->string('pickup_address')->nullable();
            $table->string('pickup_city')->nullable();
            $table->string('pickup_state')->nullable();
            $table->string('pickup_postal_code')->nullable();
            $table->string('pickup_country')->nullable();
            // $table->unsignedBigInteger('pickup_activity_id')->nullable();
            $table->string('receiver_name')->nullable();
            $table->string('receiver_email')->nullable();
            $table->string('receiver_phone')->nullable();
            $table->string('receiver_address')->nullable();
            $table->string('receiver_city')->nullable();
            $table->string('receiver_state')->nullable();
            $table->string('receiver_postal_code')->nullable();
            $table->string('receiver_country')->nullable();
            $table->unsignedBigInteger('package_id')->nullable();
            $table->float('package_length')->default(0);
            $table->float('package_width')->default(0);
            $table->float('package_height')->default(0);
            $table->float('package_amount')->default(0);
            $table->string('tracking_number')->nullable();
            $table->boolean('active')->default(1);
            $table->timestamps();
            $table->index(['user_id'], 'FK');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pickups');
    }
}
