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
        Schema::create('trasnsactions', function (Blueprint $table) {
            $table->id();
            $table->string('code', 255); //required dari xendit
            $table->string('external_id', 255); //required dari xendit
            // $table->string('validation_token', 128)->nullable()->after('external_id'); //digunakan untuk memvalidasi token dari table transaction
            $table->string('validation_token', 128)->nullable();
            $table->string('checkout_link', 255); //required dari xendit
            $table->string('payment_method', 255)->nullable(); //required dari xendit
            $table->string('payment_status', 255)->nullable(); //required dari xendit
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('ticket_id')->constrained('tickets')->onDelete('cascade');
            $table->foreignId('location_id')->constrained('locations')->onDelete('cascade');
            $table->integer('price_per_pack');
            $table->integer('ppn');
            $table->integer('total');
            $table->integer('qty');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trasnsactions');
    }
};
