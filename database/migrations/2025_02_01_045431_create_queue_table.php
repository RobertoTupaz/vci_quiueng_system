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
        Schema::create('queue', function (Blueprint $table) {
            $table->id();
            $table->foreignId('transaction_id')->constrained(
                table: 'transactions', indexName: 'queue_transaction_id'
            )->onDelete('cascade');
            $table->string('ticket_number');
            $table->char('ticket_letter');
            $table->string('priority_level');
            $table->string('status');
            $table->foreignId('user_id')->constrained(
                table: 'users', indexName: 'queue_user_id'
            )->onDelete('cascade');
            $table->integer('queue_count');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('queue');
    }
};
