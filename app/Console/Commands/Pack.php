<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use File;

abstract class Pack extends Command
{
    abstract public function packToDir($append = null);
    abstract public function files();

    public function handle()
    {
        $this->clearOldDir();
        $this->pack();

        $this->info('Packed sucessfuly!');
    }

    protected function clearOldDir()
    {
        File::cleanDirectory($this->packToDir());
    }

    protected function pack()
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
