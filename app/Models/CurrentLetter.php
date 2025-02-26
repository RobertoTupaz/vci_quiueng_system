<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CurrentLetter extends Model
{
    use HasFactory;

    protected $table = 'current_letter';
    protected $fillable = [
        'letter',
        'number'
    ];
}
