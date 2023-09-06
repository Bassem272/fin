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
        Schema::table('orders',function (Blueprint $table){
            $table->string('customer_name');
            $table->integer('customer_phone');
            $table->string('customer_email')->unique();
            $table->string('customer_address');
    
            $table->integer('total');
            $table->json('order_items');


            $table->foreign('customer_email')->references('email')->on('customers')->onDelete('cascade');
             $table->foreign('customer_name')->references('name')->on('customers')->onDelete('cascade');
            $table->foreign('customer_phone')->references('phone')->on('customers')->onDelete('cascade');
            $table->foreign('customer_address')->references('address')->on('customers')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
