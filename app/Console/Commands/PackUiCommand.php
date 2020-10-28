<?php

namespace App\Console\Commands;

class PackUiCommand extends Pack
{
    protected $signature = 'pack:ui';

    protected $description = 'Đóng gói ui vào package laravel-plus';

    public function packToDir($append = null)
    {
        return base_path('packages/laravel-plus/ui/' . $append);
    }

    public function files()
    {
        return [
            'app/Http/Controllers/MainController.php',
            'public/img',
            'resources/js',
            'resources/views/main.blade.php',
        ];
    }
}
