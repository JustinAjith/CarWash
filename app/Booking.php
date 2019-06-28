<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Booking extends Model
{
    use Notifiable;

    protected $fillable = ['vehicle', 'service_id', 'date', 'time', 'first_name', 'last_name', 'email', 'phone', 'message', 'status'];

    public function service()
    {
        return $this->belongsTo(Service::class);
    }
}
