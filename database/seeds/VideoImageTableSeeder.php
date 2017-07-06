<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VideoImageTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $videoImages = array(
            array(
                'type'   =>  'video',
                'url'    =>  'http://www.youtube.com/v/KEowmVZwX8A&hl=en&fs=1'
            ),
            array(
                'type'   => 'video',
                'url'    => 'http://www.youtube.com/v/KEowmVZwX8A&hl=en&fs=1'
            ),
            array(
                'type'   => 'image',
                'url'    => 'common area.jpg'
            ),
            array(
                'type'   => 'image',
                'url'    => 'common area.jpg'
            ),
            array(
                'type'   => 'image',
                'url'    => 'common area.jpg'
            )
        );

        foreach ($videoImages as $row){
            DB::table('video_images')->insert([
                'type'   =>  $row['type'],
                'url'    =>  $row['url'],
                'created_at'  => Carbon::now(),
                'updated_at'  => Carbon::now()
            ]);
        }

    }
}
