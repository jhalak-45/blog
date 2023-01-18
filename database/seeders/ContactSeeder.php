<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Contactd;

class ContactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $contact = new Contactd;
        $contact->name = 'Jhalak Dhami';
        $contact->email = 'jhalakisme@gmail.com';
        $contact->contact_number = 9849406142;
        $contact->facebook='https://www.facebook.com/jhalak';
        $contact->github='https://www.github.com/jhalak-45';
        $contact->address='Kedarsyeu-06 Binada Bajhang';
        $contact->info='this is summary about me';
        $contact->website = 'https://www.jhalakdhami.com.np';
        $contact->save();








    }
}
