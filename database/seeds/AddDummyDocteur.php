<?php

use Illuminate\Database\Seeder;

class AddDummyDocteur extends Seeder
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
         ['nom'=>'Villalongue', 'prenom'=>'Maxime', 'addresse'=>'2, avenue de la tramontane','codepostal'=>'66000',
       'ville'=>'Perpignan','telfixe'=>'047654389267','telmobile'=>'067546598','mail'=>'maxime@villalongue.net',
     'web'=>'www.villalongue.net','specialite'=>'Generaliste','users_id'=>'1'],

        ];
        \DB::table('docteurs')->insert($data);
    }
}
