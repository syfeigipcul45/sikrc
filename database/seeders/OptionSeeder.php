<?php

namespace Database\Seeders;

use App\Models\Option;
use Illuminate\Database\Seeder;

class OptionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Option::create([
            'logo' => '',
            'favicon' => '',
            'phone' => '-',
            'email' => 'kphp.kendilo@gmail.com',
            'address' => 'Jalan Jenderal Sudirman Km 1 No. 09 RT. 009 / RW. 003 Kel. Tanah Grogot Kec. Tanah Grogot Kab. Paser',
            'whatsapp' => '085389615738',
            'twitter' => 'https://twitter.com/',
            'facebook' => 'https://facebook.com/Kphp Kendilo',
            'instagram' => 'https://instagram.com/kphpkendilo',
            'youtube' => 'https://www.youtube.com/channel/UC3EuD4lmQxa2ijJcv9oxTOg',
            'profile_url' => 'https://www.youtube.com/watch?v=UN3f628tJ4U',
            'profile_title' => 'Selamat Datang di SI-KRC',
            'profile_description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum',
            
        ]);
    }
}
