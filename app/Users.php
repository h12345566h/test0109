<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;


class Users extends Authenticatable
{
    use Notifiable;
    use SoftDeletes;

    protected $table = 'users';
    protected $primaryKey = 'Account';
    public $incrementing = false;
    protected $dates = ['deleted_at'];

    protected $fillable = [
        'Account', 'Password',
    ];

    protected $hidden = [
        'Password'
    ];
}
