<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Setting;
// use Spatie\Backtrace\File;
use Illuminate\Support\Facades\File;

use Illuminate\Support\Facades\DB;
class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $setting = new Setting;
        $setting->name='Jhalak dhami';
        $setting->about='this is me jhalakj dhami';
        // $file = File::get(public_path('images/2x.jpg'));
        // DB::table('settings')->insert([
        //     'name' => 'image.jpg',
        //     'data' => $file,
        // ]);
        $setting->cv='jhalak dhami';
        $setting->image='jhad';
        $setting->homepage_image='kasd';
        $setting->save();






    }
}
