<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AboutTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $abouts = array(
            array(
                'id_table'    => '1',
                'image'       => '1498485732Lucky-City-Mall-Phnom-Penh.jpg',
                'description' => 'Lucky Mall is the leading Market Expansion Services in cambodia. Our Ckients and Customers bdndfit from intergrated and tailor-made services along the entire value chain, offter any combination of sourcing,marketing,seles;distribution and after-sal support services.A holding company eith a select portfoli o representing meny of the Group\'s non listed Asian businesses,principally in engineering and constaution and IT services.(100%)Hong Kong,Macauand the united kingdom, and with a large and growinA holding company eith a select portfoli o representing meny of the Group\'s non listed Asian businesses,principally in engineering and constaution and IT services.(100%)Hong Kong,Macauand the united kingdom, and with a large and growin',
                'lang'        => 'en',
            ),
            array(
                'id_table'    => '1',
                'image'       => '1498485732Lucky-City-Mall-Phnom-Penh.jpg',
                'description' => 'នេះឡាក់គីម៉លគឺការពង្រីកទីផ្សារនាំមុខគេសេវាកម្មនៅក្នុងប្រទេសកម្ពុជា។ Ckients និងអតិថិជនរបស់យើង bdndfit ពីសេវាកម្មរួមបញ្ចូលគ្នានិងការរៀបចំតាមតម្រូវការរបស់នៅតាមបណ្តោយខ្សែសង្វាក់តម្លៃទាំងមូល, offter រួមបញ្ចូលគ្នានៃប្រភពទីផ្សារ seles, ណាមួយ; សេវាគាំទ្រចែកចាយនិងបន្ទាប់ពីសាល ជាក្រុមហ៊ុនកាន់ eith ជ្រើស portfoli o តំណាងឱ្យ meny នៃការមិនអាជីវកម្មនៅតំបន់អាស៊ីដែលបានរាយ Group បានសំខាន់ក្នុងការវិស្វកម្មនិង constaution និងសេវាកម្ម IT ។ (100%) ហុងកុង, Macauand នគររួបរួមនិងមានធំនិង growin ជាក្រុមហ៊ុនកាន់ eith ជ្រើស portfoli o តំណាងឱ្យ meny នៃការមិនអាជីវកម្មនៅតំបន់អាស៊ីដែលបានរាយ Group បានសំខាន់ក្នុងការវិស្វកម្មនិង constaution និងសេវាកម្ម IT ។ (100%) ហុងកុង, Macauand នគររួបរួមនិងមានធំនិង growin',
                'lang'        => 'kh',
            )
        );

        foreach ($abouts as $key => $row){

            DB::table('abouts')->insert([
                'id_table'  => $row['id_table'],
                'image'     => $row['image'],
                'description' => $row['description'],
                'lang'       => $row['lang'],
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
        }
    }
}
