<?php

use Illuminate\Database\Seeder;

class AddDummyEvent extends Seeder
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
         ['titre'=>'Finacial forum','eve_patient_id'=>'2','eve_user_id'=>'1' ,'start_date'=>'2018-04-12 09:05:00', 'end_date'=>'2018-04-12 10:00:00'],
         ['titre'=>'Devtalk', 'eve_patient_id'=>'2','eve_user_id'=>'1' ,'start_date'=>'2018-04-13 09:05:00', 'end_date'=>'2018-04-13 12:05:00'],
         ['titre'=>'Super Event', 'eve_patient_id'=>'2','eve_user_id'=>'1' ,'start_date'=>'2018-04-23 13:05:00', 'end_date'=>'2018-04-23 13:55:00'],
         ['titre'=>'wtf event', 'eve_patient_id'=>'2','eve_user_id'=>'1' ,'start_date'=>'2018-04-19 09:05:00', 'end_date'=>'2018-04-19 19:05:00'],
        ];
        \DB::table('events')->insert($data);
    }
}
