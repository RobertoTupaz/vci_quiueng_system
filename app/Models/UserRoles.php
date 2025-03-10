<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserRoles extends Model
{
    protected $table = 'counter_roles';
    protected $fillable = [
        'user_id',
        'role_id'
    ];
    use HasFactory;
}
