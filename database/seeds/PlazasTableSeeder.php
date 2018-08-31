<?php

use Illuminate\Database\Seeder;

class PlazasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('plazas')->insert([
        	[
				'name' => 'Apizaco' 
			],
			[
				'name' => 'Atlixco' 
			],
			[
				'name' => 'BC' 
			],
			[
				'name' => 'Cd. México' 
			],
			[
				'name' => 'Chiapas' 
			],
			[
				'name' => 'Córdoba' 
			],
			[
				'name' => 'Culiacán' 
			],
			[
				'name' => 'Ensenada' 
			],
			[
				'name' => 'Guanajuato' 
			],
			[
				'name' => 'Irapuato' 
			],
			[
				'name' => 'Juriquilla' 
			],
			[
				'name' => 'León' 
			],
			[
				'name' => 'Mérida' 
			],
			[
				'name' => 'Monterrey' 
			],
			[
				'name' => 'Nuevo León' 
			],
			[
				'name' => 'Orizaba' 
			],
			[
				'name' => 'Puebla' 
			],
			[
				'name' => 'Querétaro' 
			],
			[
				'name' => 'Sinaloa' 
			],
			[
				'name' => 'Sn. Fco. Del Rincón' 
			],
			[
				'name' => 'Tijuana' 
			],
			[
				'name' => 'Veracruz' 
			],
			[
				'name' => 'Xalapa' 
			],
			[
				'name' => 'Zacatelco'
			],
        ]);
    }
}
