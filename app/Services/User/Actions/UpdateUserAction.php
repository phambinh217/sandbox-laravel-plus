<?php

namespace App\Services\User\Actions;

use Phambinh217\LaravelPlus\Executor\Result;
use Validator;
use Illuminate\Validation\Rules;
use Illuminate\Validation\ValidationException;
use App\Models\User;

class UpdateUserAction
{
    public function handle(User $user, array $data)
    {
        $validator = $this->validate($data);

        if ($validator->fails()) {
            $message = $validator->errors()->first();
            return Result::error($message, new ValidationException($validator));
        }

        $user = $this->create($data);

        return Result::success($user);
    }

    private function update(User $user, array $data)
    {
        return $user->update($data);
    }

    private function validate($data)
    {
        $validator = Validator::make($data, [
            //
        ]);

        return $validator;
    }
}
