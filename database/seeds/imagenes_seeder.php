<?php

use Illuminate\Database\Seeder;
use Fakes\Factory as Faker;
class imagenes_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$faker = Faker::create();
     	DB::table('imagenes')->truncate();
		for ($i=0; $i < 2; $i++) {
    	DB::table('imagenes')->insert([
    		'name'  => str_random(5),
    		'url'  => $faker->randomElement(['imagen1.03.jpeg','imagen2.03.jpeg']),
    		'pitch'  => '-2.1',
    		'yaw'  => '132.9',
    		'id_tour'=>'1',
    	]);   
	}
}

