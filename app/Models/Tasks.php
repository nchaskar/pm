<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Tasks extends Authenticatable
{
    use Notifiable;

    protected $table = 'tasks';

    protected $fillable = [
        'task_name', 'description', 'assigned_to','project_id','end_date', 'start_date', 'created_at','updated_at','status'
    ];

}
