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
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('service_id')->constrained('services')->onDelete('cascade');
            $table->foreignId('service_detail_id')->constrained('service_detail')->onDelete('cascade');
            $table->string('name');
            $table->string('description');
            $table->enum('status', ['antrian', 'proses', 'selesai']);
            $table->enum('payment_status', ['belum bayar', 'sudah bayar']);
            $table->string('payment_proof')->nullable();
            $table->float('total_price');
            $table->string('transaction_code');
            $table->string('address')->nullable();
            $table->string('phone_number')->nullable();
            $table->string('service_date');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transactions');
    }
};
