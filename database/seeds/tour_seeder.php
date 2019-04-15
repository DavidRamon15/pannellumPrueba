<?php

use Illuminate\Database\Seeder;

class tour_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
     	DB::table('tours')->truncate();
		for ($i=0; $i < 10; $i++) {
    	DB::table('tours')->insert([
    		'name'  => str_random(5),

    	]);
		}
    }
}
