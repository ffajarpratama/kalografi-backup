<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class custom extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $table = 'customs';

    public function bookings()
    {
        return $this->hasMany(Booking::class, 'custom_id');
    }
}
