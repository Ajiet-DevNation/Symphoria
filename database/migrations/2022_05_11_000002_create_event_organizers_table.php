<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('event_organizers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->mediumText('email')->nullable();
            $table->mediumText('name');
            $table->mediumText('position')->nullable();
            $table->mediumText('phone')->nullable();
            $table->unsignedBigInteger('event_id');
            $table->longText('img')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('event_organizers');
    }
};
