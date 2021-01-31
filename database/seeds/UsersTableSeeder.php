<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;



class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


        User::Truncate();

        DB::table('role_user')->truncate();







        $admin = User::create(['name' => 'admin user','email' => 'admin@mail.com','password' => Hash::make('password')]);
        $author = User::create(['name' => 'author user','email' => 'author@mail.com','password' => Hash::make('password')]);
        $user = User::create(['name' => 'normal user','email' => 'user@mail.com','password' => Hash::make('password')]);

        $adminRole = Role::first()->where('name','admin');
        $userRole = Role::first()->where('name','user');
        $authorRole= Role::first()->where('name','author');


        $admin->roles()->attach($adminRole->get(['id']));
        $author->roles()->attach($authorRole->get(['id']));
        $user->roles()->attach($userRole->get(['id']));


    }
}
