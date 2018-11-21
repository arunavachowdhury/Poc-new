<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    public $table = 'users';

    const USER_OFFICE_EXECUTIVE = 'officeexecutive';
    const USER_OFFICE_ADMIN = 'office_admin';
    const USER_DIRECTOR = 'director';
    const USER_APPLICATION_ADMIN = 'admin';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'usertype',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * Tells if the user is a USER_APPLICATION_ADMIN type user
     *
     * @return boolean
     */
    public function isUserApplicationAdmin()
    {
        return $this->usertype == User::USER_APPLICATION_ADMIN;
    }

    /**
     * Tells if the user is a USER_DIRECTOR type user
     *
     * @return boolean
     */
    public function isUserDirector()
    {
        return $this->usertype == User::USER_DIRECTOR;
    }
}
