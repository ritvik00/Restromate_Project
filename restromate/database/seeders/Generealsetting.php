<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class Generealsetting extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('generalsetting')->insert([
            'sitetitle' => 'Restromate',
            'number' => '1234560789',
            'user_id' => '1',
            'email' => 'Demo@gmail.com',
            'siteimage' => '4Oq27_1671876283.png',
            'facebook' => '#',
            'twitter' => '#',
            'instagram' => '#',
            'youtube' => '#',
            'faviconimage' => 'zTH3Q_1672059107.png',
            'copyright'=>'© All rights reserved CodeBeck - Stream For Innovative Solutions',
            'address' => '209, Shyam Chambers Opp, Ring Road, Surat - 395002',
            'description' => 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old.',
            'mapiframe' => '<div class="mapouter"><div class="gmap_canvas"><iframe class="gmap_iframe" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?width=600&amp;height=400&amp;hl=en&amp;q=University of Oxford&amp;t=&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"></iframe><a href="https://www.gachacute.com/">Download</a></div><style>.mapouter{position:relative;text-align:right;width:600px;height:400px;}.gmap_canvas {overflow:hidden;background:none!important;width:600px;height:400px;}.gmap_iframe {width:600px!important;height:400px!important;}</style></div>',
            'metakeywords' => 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical La.',
            'metadescription' => 'Contrary to popular belief, Lorem Ipsum is not simply random text.',
            'created_at' => now(),
        ]);

        DB::table('generalsetting')->insert([
            'sitetitle' => 'Restromate admin',
            'number' => '1234560789',
            'user_id' => '2',
            'email' => 'Demo@gmail.com',
            'siteimage' => '4Oq27_1671876283.png',
            'facebook' => '#',
            'twitter' => '#',
            'instagram' => '#',
            'youtube' => '#',
            'faviconimage' => 'zTH3Q_1672059107.png',
            'copyright'=>'© All rights reserved CodeBeck - Stream For Innovative Solutions',
            'address' => '209, Shyam Chambers Opp, Ring Road, Surat - 395002',
            'description' => 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old.',
            'mapiframe' => '<div class="mapouter"><div class="gmap_canvas"><iframe class="gmap_iframe" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?width=600&amp;height=400&amp;hl=en&amp;q=University of Oxford&amp;t=&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"></iframe><a href="https://www.gachacute.com/">Download</a></div><style>.mapouter{position:relative;text-align:right;width:600px;height:400px;}.gmap_canvas {overflow:hidden;background:none!important;width:600px;height:400px;}.gmap_iframe {width:600px!important;height:400px!important;}</style></div>',
            'metakeywords' => 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical La.',
            'metadescription' => 'Contrary to popular belief, Lorem Ipsum is not simply random text.',
            'created_at' => now(),
        ]);
    }
}
