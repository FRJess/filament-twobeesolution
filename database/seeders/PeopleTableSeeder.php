<?php

namespace Database\Seeders;

use App\Models\People;
use Illuminate\Database\Seeder;

class PeopleTableSeeder extends Seeder
{
        /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {
        $people = config('db.people');

        foreach ($people as $person) {
            $new_person = new People();
            $new_person->name = $person['name'];
            $new_person->lastname = $person['lastname'];
            $new_person->city = $person['city'];
            $new_person->eye_color = $person['eye_color'];
            $new_person->hair_color = $person['hair_color'];
            $new_person->citizenship = $person['citizenship'];
            $new_person->save();
        }
    }
}
