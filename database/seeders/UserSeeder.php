<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = new User();
        $user->name ='Admin';
        $user->email= 'admin@ecuestre.com';
        $user->password =bcrypt('12345678');
        $user->save();


        $user->roles()->sync(1);


        /* for ($i = 1; $i <= 10; $i++) {
            User::create([
                'name' => "Trabajador ".strval($i),
                'email' => "trabajador".strval($i).'@ecuestre.com',
                'password' => bcrypt('12345678')
            ]);

        } */
    }
}
