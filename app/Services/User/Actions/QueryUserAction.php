<?php

namespace App\Services\User\Actions;

use App\Models\User;

class QueryUserAction
{
    public function handle(array $options = [])
    {
        $query = User::query();

        // if (isset($options['id'])) {
        //    $query->where('id', $options['id']);
        // }

        return $query;
    }
}
