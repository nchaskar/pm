<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class ProjectMembers extends Authenticatable
{
    use Notifiable;

    protected $guard = 'project_members';

    protected $fillable = [
        'project_id', 'user_id',
    ];
}
