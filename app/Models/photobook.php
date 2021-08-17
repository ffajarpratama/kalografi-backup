<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class photobook extends Model
{
    use HasFactory;
    protected $table = 'photobooks';
    public function booking()
    {
        return $this->hasMany(Booking::class, 'photobook');
    }
}
