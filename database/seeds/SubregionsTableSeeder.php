<?php

use Illuminate\Database\Seeder;

class SubregionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('subregions')->insert([
        	[
        		'name' => 'méxico'
        	],
        	[
        		'name' => 'puebla'
        	],
        	[
        		'name' => 'ensenada'
        	],
        	        	[
        		'name' => 'tijuana'
        	],
        	[
        		'name' => 'los mochis'
        	],
        	[
        		'name' => 'guamuchil'
        	],
        	        	[
        		'name' => 'culiacan'
        	],
        	[
        		'name' => 'baja california'
        	],
        	[
        		'name' => 'sinaloa'
        	],
        	        	[
        		'name' => 'monterrey'
        	],
        	[
        		'name' => 'león'
        	],
        	[
        		'name' => 'guanajuato'
        	],
        	[
        		'name' => 'querétaro'
        	],
        	[
        		'name' => 'tlaxcala'
        	],
        	[
        		'name' => 'tecamachalco'
        	],
        	[
        		'name' => 'tuxtal guitierrez'
        	],
        	[
        		'name' => 'yucatán'
        	],
        	[
        		'name' => 'veracruz'
        	],
        ]);
    }
}
