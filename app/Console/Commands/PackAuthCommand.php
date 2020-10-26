<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use File;

class PackAuthCommand extends Command
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
            'app/Formats/UserFormat.php',
            'app/Services/Auth',
        ];
    }

    public function handle()
    {
        $this->clearOldDir();
        $this->pack();

        $this->info('Packed sucessfuly!');
    }

    private function clearOldDir()
    {
        File::cleanDirectory($this->packToDir());
    }

    private function pack()
    {
        $files = $this->files();
        foreach ($files as $file) {
            $originalPath = base_path($file);
            $destPath = $this->packToDir($file);
            if (is_file($originalPath)) {
                $dirname = dirname($destPath);
                if (!is_dir($dirname)) {
                    mkdir($dirname, 0777, true);
                }

                File::copy($originalPath, $destPath);
                continue;
            }

            if (is_dir($originalPath)) {
                File::copyDirectory($originalPath, $destPath, true);
            }
        }
    }
}
