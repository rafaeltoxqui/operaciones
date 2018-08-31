<?php

use Illuminate\Database\Seeder;

class PdvStatusContratosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pdv_status_contratos')->insert([
        	[
        		'status' => 'firmado'
        	],
        	[
        		'status' => 'en proceso de firma'
        	]
        ]);
    }
}
