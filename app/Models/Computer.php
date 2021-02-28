<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\User;
use App\Models\Component;

class Computer extends Model
{
    use HasFactory;

    protected $table = 'computers';

    protected $fillable = [
        'name',
        'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function components()
    {
        return $this->belongsToMany(Component::class);
    }
}
