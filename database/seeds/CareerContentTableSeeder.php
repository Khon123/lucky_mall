<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CareerContentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $careerContent = array(
            array(
                'id_table' => 1,
                'detial'   => 'Here at Lucky Salon we are always looking for talented people to join our team. We encourage you to submit an application any time, even if there are no current openings listed. If we think you\'re right for us, we\'ll find you a place in our organisation.If you\'re interested, submit your CV with covering letter now.',
                'lang'     => 'en'

                ),
            array(
                'id_table' => 1,
                'detial'   => 'Here at Lucky Salon we are always looking for talented people to join our team. We encourage you to submit an application any time, even if there are no current openings listed. If we think you\'re right for us, we\'ll find you a place in our organisation.If you\'re interested, submit your CV with covering letter now.',
                'lang'     => 'kh'
            )
        );

        foreach ($careerContent as $career){
            DB::table('career_contents')->insert([
                'id_table' => $career['id_table'],
                'detial'   =>$career['detial'],
                'lang'     =>$career['lang'],
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);

        }
    }
}
