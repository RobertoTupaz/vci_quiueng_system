<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('queues', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->foreignId('role_id')->constrained(
                table: 'roles',
                indexName: 'transaction_role'
            )->onDelete('cascade');
            $table->string('ticket_number');
            $table->char('ticket_letter');
            $table->enum('priority_level', ['normal', 'priority'])->default('normal');
            $table->enum('status', ['new', 'ongoing', 'done'])->default('new');
            $table->foreignId('user_id')->nullable()->constrained(
                table: 'users',
                indexName: 'queue_user_id'
            )->onDelete('cascade')->nullOnDelete();
            // $table->integer('queue_count')->default(1);
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
