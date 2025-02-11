<?php

use App\Models\Transaction;
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
        $transactionList = [
            'TOR', 'Statement of Account', 
            'Clearance', 'Payment',
        ];
        $i = 0;
        foreach ($transactionList as $key => $value) {
            Transaction::create([
                'name' => $transactionList[$i]
            ]);
            $i++;
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Schema::dropIfExists('add_transactions');
    }
};
