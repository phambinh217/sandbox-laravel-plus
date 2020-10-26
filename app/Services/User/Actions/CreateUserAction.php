<?php

namespace App\Services\User\Actions;

use Phambinh217\LaravelPlus\Executor\Execute;
use Validator;
use Illuminate\Validation\Rules;
use Illuminate\Validation\ValidationException;
use App\Models\User;

class CreateUserAction
{
    use Execute;

    public function handle(array $data)
    {
        return $this->execute(function ($success, $error) use ($data) {
            $validator = $this->validate($data);

            if ($validator->fails()) {
                $message = $validator->errors()->first();
                return $error($message, new ValidationException($validator));
            }

            $user = $this->create($data);

            return $success($user);
        });
    }

    private function create(array $data)
    {
        return User::create($data);
    }

    private function validate($data)
    {
        $validator = Validator::make($data, [
            //
        ]);

        return $validator;
    }
}
