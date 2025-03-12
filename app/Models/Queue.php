<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Queue extends Model
{
    protected $tables = 'queue';
    protected $fillable = [
        'role_id',
        'ticket_number',
        'ticket_letter',
        'priority_level',
        'status',
        'user_id',
        'queue_count',
        'name'
    ];

    public function role() {
        return $this->belongsTo(Role::class, 'role_id');
    }

    public function counter() {
        return $this->belongsTo(User::class,'user_id');
    }
}
