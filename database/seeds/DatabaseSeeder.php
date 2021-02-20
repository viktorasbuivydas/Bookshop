<?php

use Illuminate\Database\Seeder;
use App\User;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
       $this->call([
            RoleSeeder::class,
            UserSeeder::class,
            GenreSeeder::class,
            //BookSeeder::class
           //User::factory()->count(50)->create()
       ]);
    }
}
