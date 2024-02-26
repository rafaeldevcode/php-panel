<?php

namespace Src\Models;

class AccessToken extends Model
{
    public $table = 'access_token';

    public function user(): User
    {
        return $this->belongsTo(User::class, 'users', 'user_id');
    }
}
