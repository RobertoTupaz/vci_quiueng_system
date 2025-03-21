<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table = 'roles';
    protected $fillable = [
        'name'
    ];

    public function counters() {
        return $this->belongsToMany(User::class, 'counter_roles')
        ->withTimestamps();
    }

    use HasFactory;
}
