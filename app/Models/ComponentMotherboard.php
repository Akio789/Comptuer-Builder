<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ComponentMotherboard extends Model
{
    use HasFactory;

    protected $table = 'component_motherboard';

    protected $fillable = [
        'component_type',
        'motherboard_id',
        'quantity',
        'socket'
    ];
}
