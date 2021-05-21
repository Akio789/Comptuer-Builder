<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Motherboard extends Model
{
    use HasFactory;

    protected $table = 'motherboards';

    protected $fillable = [
        'name',
        'brand',
        'price',
        'socket'
    ];

    public function computers()
    {
        return $this->hasMany(Computer::class);
    }

    public function slots()
    {
        return $this->hasMany(ComponentMotherboard::class);
    }
}
