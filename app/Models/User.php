<?php

namespace App;

use App\Http\Resources\InviteUserResource;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'nickname', 'email', 'invite_user_id',
        'money', 'status', 'theme'
    ];

    protected $hidden = [
        'password'
    ];

    protected $attributes = [
        'money' => 0,
        'status' => 'active',
        'theme' => 'default'
    ];

    public function invite_user($user_id)
    {
        if ($user_id != null) {
            return new InviteUserResource(User::firstWhere(['id' => $user_id]));
        }
        else
            return null;
    }

    public function privileges()
    {
        return $this->hasMany(Privilege::class);
    }
}
