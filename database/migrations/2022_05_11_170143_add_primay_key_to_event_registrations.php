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
        Schema::table('event_registrations', function (Blueprint $table) {
//             $table->primary(['event_id', 'user_id']);
//             $table->foreign('event_id')
//             ->references('id')
//             ->on('events');    
// $table->foreign('user_id')
//             ->references('id')
//             ->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('event_registrations', function (Blueprint $table) {
            //
        });
    }
};
