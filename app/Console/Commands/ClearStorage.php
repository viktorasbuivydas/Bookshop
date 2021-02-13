<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;

class ClearStorage extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'clearStorage';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Deletes all uploaded files from storage';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $directory = 'public\uploads\images';
        $files = Storage::files($directory);
        Storage::delete($files);
        return 'Succesfully deleted directory';
    }
}
