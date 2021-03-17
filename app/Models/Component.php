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
        'brand',
        'model',
        'price'
    ];

    public function computers()
    {
        return $this->belongsToMany(Computer::class);
    }
}
