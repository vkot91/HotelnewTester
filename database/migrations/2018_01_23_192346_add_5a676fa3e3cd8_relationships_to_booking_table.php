<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Add5a676fa3e3cd8RelationshipsToBookingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('bookings', function(Blueprint $table) {
                if (!Schema::hasColumn('bookings', 'room_id')) {
                $table->integer('room_id')->unsigned()->nullable();
                $table->foreign('room_id', '110461_5a676fa239ffd')->references('id')->on('rooms')->onDelete('cascade');
                }

        });
        Schema::table('bookings',function (Blueprint $table)
        {
           if(!Schema::hasColumn('bookings','user_id'))
           {
               $table->integer('user_id')->unsigned()->nullable();
               $table->foreign('user_id','110461_5a676fa239ffy')->references('id')->on('users')->onDelete('cascade');
           }
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('bookings', function(Blueprint $table) {

        });
    }
}
