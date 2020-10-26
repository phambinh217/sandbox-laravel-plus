<?php

namespace App\Services\User\Actions;

use Phambinh217\LaravelPlus\Executor\Execute;
use App\Models\User;

class DeleteUserAction
{
    use Execute;

    public function handle(User $user)
    {
        return $this->execute(function ($success, $error) use ($data) {
            $user->delete($data);
            return $success(true);
        });
    }
}
