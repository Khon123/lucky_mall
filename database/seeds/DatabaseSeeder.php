<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
//        $this->call(MenuTableSeeder::class);
//        $this->call(VideoImageTableSeeder::class);
//        $this->call(CareerContentTableSeeder::class);
//        $this->call(AboutTableSeeder::class);
//        $this->call(HomeDescriptionTableSeeder::class);
//        $this->call(HomeContentTableSeeder::class);
//        $this->call(AreaDetailTableSeeder::class);
        $this->call(SliderTableSeeder::class);
    }
}
