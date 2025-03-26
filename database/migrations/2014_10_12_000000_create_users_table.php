<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->mediumText('uid')->nullable();
            $table->mediumText('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->mediumText('remember_token', 100)->nullable();
            $table->mediumText('phone')->nullable();
            $table->integer('credits')->default(0)->nullable();
            $table->mediumText('usn')->nullable();
            $table
                ->boolean('is_paid')
                ->default(0)
                ->nullable();
            $table->longText('payment_screenshot')->nullable();
            $table->mediumText('transaction_id')->nullable();
            $table
                ->enum('pass_type', ['base', 'premium', 'mega', 'AJIET'])
                ->default('base')
                ->nullable();
            $table->mediumText('college_name')->nullable();
            $table->longText('id_card')->nullable();
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
        Schema::dropIfExists('users');
    }
};
