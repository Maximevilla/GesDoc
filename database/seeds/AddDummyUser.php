<?php

use Illuminate\Database\Seeder;

class AddDummyUser extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // 'YYYY-MM-DD HH:MM:SS
        $data = [
         ['name'=>'Max', 'email'=>'maxime@villalongue.net', 'password'=>'$2y$10$gz.EMs7ZPW/go4N9p3Uc9.mT7YoJfTUxYMu9fiXHY4GuCXHbyV1qO'],
         ['name'=>'Justine', 'email'=>'justine@gmail.net', 'password'=>'$2y$10$gz.EMs7ZPW/go4N9p3Uc9.mT7YoJfTUxYMu9fiXHY4GuCXHbyV1qO'],
         ['name'=>'Aurelien', 'email'=>'Aurelien@gmail.com', 'password'=>'$2y$10$gz.EMs7ZPW/go4N9p3Uc9.mT7YoJfTUxYMu9fiXHY4GuCXHbyV1qO'],
         ['name'=>'suse', 'email'=>'suse@suse>com', 'password'=>'$2y$10$gz.EMs7ZPW/go4N9p3Uc9.mT7YoJfTUxYMu9fiXHY4GuCXHbyV1qO'],
        ];
        \DB::table('users')->insert($data);
    }
}
