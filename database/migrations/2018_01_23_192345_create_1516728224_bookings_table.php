<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Create1516728224BookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(! Schema::hasTable('bookings')) {
            Schema::create('bookings', function (Blueprint $table) {
                $table->increments('id');
                $table->datetime('time_from')->nullable();
                $table->datetime('time_to')->nullable();
                $table->integer('diff_days')->nullable();
                $table->text('additional_information')->nullable();
                $table->string('first_name');
                $table->string('last_name');
                $table->string('address')->nullable();
                $table->string('phone')->nullable();
                $table->string('email');
                $table->integer('all_price')->nullable();
                $table->string('isActive')->default('Inactive');


                $table->timestamps();
                $table->softDeletes();

                $table->index(['deleted_at']);
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bookings');
    }
}
