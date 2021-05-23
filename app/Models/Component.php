<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Computer;

class Component extends Model
{
    use HasFactory;

    protected $table = 'components';

    protected $fillable = [
        'name',
        'socket',
        'brand',
        'price',
        'type',
        'capacity',
        // CPU
        'cores',
        'frequency_boost',
        // RAM
        'speed',
        // SDD and HDD
        'cache',
        'interface',
        // Cooler
        'noise',
        'cooler_size',
        'radiator',
        // GPU
        'core_frequency',
        'core_boost',
        'gpu_size'
    ];

    public function computers()
    {
        return $this->belongsToMany(Computer::class);
    }
}
