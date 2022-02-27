<?php

namespace App\Console\Commands;

use App\Models\Watcher;
use Illuminate\Console\Command;

class CheckWatchers extends Command
{
    protected $signature = 'check-watchers';
    protected $description = 'Checks all watchers';

    public function handle()
    {
        Watcher::all()->each(function (Watcher $watcher) {
            $watcher->check();
        });
    }
}
