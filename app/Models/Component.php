<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Computer;

class Component extends Model
{
    protected $table = 'components';

    use HasFactory;

    public function computers()
    {
        return $this->belongsToMany(Computer::class);
    }
}
