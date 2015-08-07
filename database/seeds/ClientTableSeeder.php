<?php

use Illuminate\Database\Seeder;

class ClientTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        WideProject\Client::truncate();
        factory(WideProject\Client::class, 3)->create();
    }
}
