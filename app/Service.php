<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Service extends Model
{
    use Notifiable;

    protected $fillable = ['name', 'amount'];

    public function sub_services()
    {
        return $this->hasMany(SubService::class);
    }

    public function booking()
    {
        return $this->hasMany(Booking::class);
    }
}
