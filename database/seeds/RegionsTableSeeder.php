<?php

use Illuminate\Database\Seeder;

class RegionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //factory(App\Region::class)->create();

        DB::table('regions')->insert([
        	[
        		'name' => 'centro'
        	],
        	[
        		'name' => 'noroeste'
        	],
        	[
        		'name' => 'norte'
        	],
        	[
        		'name' => 'pacífico'
        	],
        	[
        		'name' => 'sur'
        	]
        ]);
    }
}