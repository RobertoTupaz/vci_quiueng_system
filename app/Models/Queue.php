<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Queue extends Model
{
    protected $tables = 'queue';
    protected $fillable = [
        'transaction',
        'ticket_number',
        'ticket_letter',
        'priority_level',
        'status',
        'user_id',
        'queue_count'
    ];

    use HasFactory;
}
