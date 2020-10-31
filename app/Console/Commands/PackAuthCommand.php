<?php

namespace App\Console\Commands;

class PackAuthCommand extends Pack
{
    protected $signature = 'pack:auth';

    protected $description = 'Đóng gói module auth vào package laravel-plus';

    public function packToDir($append = null)
    {
        return base_path('packages/laravel-plus/auth/' . $append);
    }

    public function files()
    {
        return [
            'app/Http/Controllers/AuthController.php',
            'app/Http/Controllers/AccountController.php',
            'app/Formats/UserFormat.php',
            'app/Services/Auth',
            'app/Services/User',
        ];
    }
}
