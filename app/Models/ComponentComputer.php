<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ComponentComputer extends Model
{
    use HasFactory;

    protected $table = 'component_computer';

    protected $fillable = [
        'component_id',
        'computer_id'
    ];
}
