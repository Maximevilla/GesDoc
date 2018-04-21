<?php

use Illuminate\Database\Seeder;

class AddDummyPatient extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $data = [
         ['nom'=>'Doe', 'prenom'=>'John', 'naissance'=>'1981-07-01','addresse'=>'2, avenue de la fourcade, 66000 Perpignan','telfixe'=>'0403674863','telmobile'=>'0654283625',
         'mail'=>'john@mail.fr','sexe'=>'H','allergies'=>'Cons','notes'=>'notes diverses et variees','medecintraitant'=>'Dr John Doe','metier'=>'Independant','users_id'=>'1',],

          ['nom'=>'Berger', 'prenom'=>'Marie', 'naissance'=>'1981-07-01','addresse'=>'2, avenue de la fourcade, 66000 Perpignan','telfixe'=>'0403674863','telmobile'=>'0654283625',
          'mail'=>'marie@mail.fr','sexe'=>'F','allergies'=>'Cons','notes'=>'notes diverses et variees','medecintraitant'=>'Dr John Doe','metier'=>'Independant','users_id'=>'1',],

          ['nom'=>'Goldman', 'prenom'=>'Pierre', 'naissance'=>'1981-07-01','addresse'=>'2, avenue de la fourcade, 66000 Perpignan','telfixe'=>'0403674863','telmobile'=>'0654283625',
          'mail'=>'mail@mail.fr','sexe'=>'H','allergies'=>'Cons','notes'=>'notes diverses et variees','medecintraitant'=>'Dr John Doe','metier'=>'Independant','users_id'=>'1',],

          ['nom'=>'Roge', 'prenom'=>'Justine', 'naissance'=>'1981-07-01','addresse'=>'2, avenue de la fourcade, 66000 Perpignan','telfixe'=>'0403674863','telmobile'=>'0654283625',
          'mail'=>'justine@mail.fr','sexe'=>'F','allergies'=>'Cons','notes'=>'notes diverses et variees','medecintraitant'=>'Dr John Doe','metier'=>'Dentiste','users_id'=>'1',],

          ['nom'=>'Marti', 'prenom'=>'Eloise', 'naissance'=>'1981-07-01','addresse'=>'2, avenue de la fourcade, 66000 Perpignan','telfixe'=>'0403674863','telmobile'=>'0654283625',
          'mail'=>'eloise@mail.fr','sexe'=>'F','allergies'=>'Cons','notes'=>'notes diverses et variees','medecintraitant'=>'Dr John Doe','metier'=>'Escroc','users_id'=>'1',],

          ['nom'=>'Leroy', 'prenom'=>'Jean', 'naissance'=>'1981-07-01','addresse'=>'2, avenue de la fourcade, 66000 Perpignan','telfixe'=>'0403674863','telmobile'=>'0654283625',
          'mail'=>'mail@mail.fr','sexe'=>'H','allergies'=>'Cons','notes'=>'notes diverses et variees','medecintraitant'=>'Dr John Doe','metier'=>'Independant','users_id'=>'1',],

        ];
        \DB::table('patients')->insert($data);

    }
}
