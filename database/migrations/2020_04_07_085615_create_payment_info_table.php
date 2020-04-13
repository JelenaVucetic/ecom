<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentInfoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payment_info', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('result');
            $table->string('reference_id');
            $table->string('transaction_id');
            $table->string('purchase_id');
            $table->string('transaction_type');
            $table->string('payment_method');
            $table->integer('amount');
            $table->string('currency');
            $table->string('message')->nullable();
            $table->string('code')->nullable();
            $table->string('card_type');
            $table->string('card_holder');
            $table->string('expiry_month');
            $table->string('expiry_year');
            $table->integer('first_six_digits');
            $table->integer('last_four_digits');
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
        Schema::dropIfExists('payment_info');
    }
}
