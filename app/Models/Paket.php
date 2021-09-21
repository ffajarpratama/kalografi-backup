<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paket extends Model
{
    use HasFactory;

    protected $table = 'pakets';
    protected $guarded = [];

    public function booking()
    {
        return $this->hasMany(Booking::class, 'paket_id');
    }

    public function galeris()
    {
        return $this->belongsTo(galeri::class, 'idgaleri');
    }
}
