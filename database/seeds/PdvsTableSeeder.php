<?php

use Illuminate\Database\Seeder;

class PdvsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pdvs')->insert([
        	[
        		'id_tienda' => '1',
        		'id_region' => '1',
        		'id_subregion' => '1',
        		'id_plaza' => '4',
        		'id_pdv_status_adquisicion' => '1',
        		'id_pdv_status_contrato' => '1',
        		'id_pdv_comment' => '1'
        	],
        	[
        		'id_tienda' => '2',
        		'id_region' => '1',
        		'id_subregion' => '1',
        		'id_plaza' => '4',
        		'id_pdv_status_adquisicion' => '1',
        		'id_pdv_status_contrato' => '1',
        		'id_pdv_comment' => '1'
        	],
        	[
        		'id_tienda' => '3',
        		'id_region' => '1',
        		'id_subregion' => '1',
        		'id_plaza' => '4',
        		'id_pdv_status_adquisicion' => '1',
        		'id_pdv_status_contrato' => '1',
        		'id_pdv_comment' => '1'
        	],
        	[
        		'id_tienda' => '4',
        		'id_region' => '1',
        		'id_subregion' => '1',
        		'id_plaza' => '4',
        		'id_pdv_status_adquisicion' => '1',
        		'id_pdv_status_contrato' => '1',
        		'id_pdv_comment' => '1'
        	],
        	[
        		'id_tienda' => '5',
        		'id_region' => '1',
        		'id_subregion' => '1',
        		'id_plaza' => '4',
        		'id_pdv_status_adquisicion' => '1',
        		'id_pdv_status_contrato' => '1',
        		'id_pdv_comment' => '1'
        	],

        ]);
    }
}
