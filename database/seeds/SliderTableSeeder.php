<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SliderTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sliders = array(
            array(
                'image'  =>  'image.jpg',
            ),
            array(
                'image'  =>  'image.jpg',
            ),
            array(
                'image'  =>  'image.jpg',
            )
        );

        foreach ($sliders as $row){
            DB::table('sliders')->insert([
                'image'  => $row['image'],
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
        }

    }
}
