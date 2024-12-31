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
        Schema::create('visit', function (Blueprint $table) {
            $table->id();
            $table->string('location');
            $table->string('address');
            $table->date('date');
            $table->string('pic');
            $table->string('file');
            $table->text('description');
            $table->unsignedBigInteger('data_sales_id');
            $table->unsignedBigInteger('transaction_type_id');
            $table->unsignedBigInteger('sector_id');
            $table->timestamps();

            $table->foreign('data_sales_id')->references('id')->on('data_sales')->onDelete('cascade');
            $table->foreign('transaction_type_id')->references('id')->on('transaction_type')->onDelete('cascade');
            $table->foreign('sector_id')->references('id')->on('sector')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('visit');
    }
};
