<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Projects extends Authenticatable
{
    use Notifiable;

    protected $table = 'projects';

    protected $fillable = [
        'name', 'description', 'owner_id','end_date', 'start_date', 'created_at','updated_at','status'
    ];

}
