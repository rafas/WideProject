<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(WideProject\Entities\User::class)->create([
            'name' => 'Rafael Santos',
            'email' => 'rafael@widenet.com.br',
            'password' => bcrypt('123456'),
            'remember_token' => str_random(10),
        ]);
        factory(WideProject\Entities\User::class, 5)->create();
    }
}
