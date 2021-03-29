<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\User;
use App\Models\Component;
use App\Models\Motherboard;
use App\Http\Constants;

class Computer extends Model
{
    use HasFactory;

    protected $table = 'computers';

    protected $fillable = [
        'name',
        'user_id',
        'motherboard_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function motherboard()
    {
        return $this->belongsTo(Motherboard::class);
    }

    public function components()
    {
        return $this->belongsToMany(Component::class);
    }

    public function getTotalPriceAttribute()
    {
        $motherboardPrice = $this->motherboard
            ? $this->motherboard->price
            : Constants::DEFAULT_MOTHERBOARD_PRICE;
        $componentsPrice = $this->components->reduce(function ($carry, $c) {
            return $carry + $c->price;
        }, 0);
        return $motherboardPrice + $componentsPrice;
    }
}
