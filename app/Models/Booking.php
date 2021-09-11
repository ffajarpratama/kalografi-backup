<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;
    protected $table = 'bookings';
    protected $guarded = [];


    public function pakets()
    {
        return $this->belongsTo(Paket::class, 'paket_id');
    }
    public function discount()
    {
        return $this->hasOne(discount::class);
    }
    public function printedphotos()
    {
        return $this->belongsTo(printedphoto::class, 'printedphoto');
    }
    public function photobooks()
    {
        return $this->belongsTo(photobook::class, 'photobook');
    }
    public function status()
    {
        return $this->hasMany(status::class, 'booking_id');
    }
}
