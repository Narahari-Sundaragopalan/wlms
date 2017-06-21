<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Contracts\Auth\CanResetPassword;
use Zizaco\Entrust\Traits\EntrustUserTrait;
use Log;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    use EntrustUserTrait;

    protected $fillable = [
        'name', 'email', 'password', 'security_question1', 'security_answer1', 'security_question2', 'security_answer2'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function getRoleName()
    {
        return $this->roles->first()['display_name'];
    }
}
