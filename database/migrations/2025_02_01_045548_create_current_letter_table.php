<?php

use App\Models\CurrentLetter;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('current_letter', function (Blueprint $table) {
            $table->id();
            $table->string('letter')->default('-');
            $table->string('number');
            $table->timestamps();
        });

    }

    public function createCurrentLeter() {
        CurrentLetter::create([
            'letter' => '-',
            'number' => 1
        ]);
    }

    public function createCurrentLetterRow()
    {
        CurrentLetter::create([
            'letter' => 'A',
            'number' => 1
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('current_letter');
    }
};
