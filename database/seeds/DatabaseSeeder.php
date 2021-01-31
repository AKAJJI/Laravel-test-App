<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {


        //disable foreign key check for this connection before running seeders
        // DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        $this->call(RolesTableSeeder::class);
         $this->call(UsersTableSeeder::class);
         DB::statement('SET FOREIGN_KEY_CHECKS=1;');
         // supposed to only apply to a single connection and reset it's self
		// but I like to explicitly undo what I've done for clarity
		// DB::statement('SET FOREIGN_KEY_CHECKS=1;');

    }
}