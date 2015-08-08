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
        WideProject\Entities\Client::truncate();
        factory(WideProject\Entities\Client::class, 30)->create();
    }
}
