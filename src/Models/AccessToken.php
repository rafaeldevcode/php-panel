<?php

namespace Src\Models;

class AccessToken extends Model
{
    public $table = 'access_token';

    /**
     * @since 1.3.1
     * 
     * @return User
     */
    public function user(): User
    {
        return $this->belongsTo(User::class, 'users', 'user_id');
    }
}
