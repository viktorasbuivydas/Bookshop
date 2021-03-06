<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use App\Console\Commands\ClearStorage;
/*
|--------------------------------------------------------------------------
| Console Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of your Closure based console
| commands. Each Closure is bound to a command instance allowing a
| simple approach to interacting with each command's IO methods.
|
*/

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->describe('Display an inspiring quote');

Artisan::command('clearStorage', function () {
    $this->comment((new ClearStorage())->handle());
})->describe('Clearing storage...');

Artisan::command('project:init', function () {
    Artisan::call('clearStorage');
    Artisan::call('migrate:fresh');
    Artisan::call('db:seed');
})->describe('Running commands');