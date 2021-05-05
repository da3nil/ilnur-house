<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            'name' => 'Администратор',
            'email' => 'ilnur@house.ru',
            'password' => bcrypt('53765376')
        ];

        $user = (new \App\User())->fill($data)->save();
    }
}
