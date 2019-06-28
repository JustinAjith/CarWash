<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class SubService extends Model
{
    use Notifiable;

    protected $fillable = ['name', 'service_id'];
}
