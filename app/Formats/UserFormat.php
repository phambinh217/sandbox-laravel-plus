<?php

namespace App\Formats;

use App\Models\User;

class UserFormat
{
    public function formatPaginate($users)
    {
        return $users;
    }

    public function formatList($users)
    {
        return $users;
    }

    public function formatItem(User $user)
    {
        return $user;
    }

    public function formatAuth(User $user)
    {
        return [
            'id' => $user->id,
            'name' => $user->name,
            'email' => $user->email,
        ];
    }
}
