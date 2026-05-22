<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('payments', function (Blueprint $table) {

            $table->id();

            // relation
            $table->foreignId('user_id')
                ->constrained()
                ->onDelete('cascade');

            // basic
            $table->string('name');

            $table->string('email')
                ->nullable();

            $table->string('phone')
                ->nullable();

            // payment
            $table->string('payment_method');

            // card
            $table->string('card_number')
                ->nullable();

            $table->string('cvv')
                ->nullable();

            // upi
            $table->string('upi_id')
                ->nullable();

            // company
            $table->boolean('is_company')
                ->default(false);

            $table->string('company_name')
                ->nullable();

            $table->string('gst_number')
                ->nullable();

            // address
            $table->string('address')
                ->nullable();

            $table->string('city')
                ->nullable();

            $table->string('state')
                ->nullable();

            // coupon
            $table->string('coupon')
                ->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
