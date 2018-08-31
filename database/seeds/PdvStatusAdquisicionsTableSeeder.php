<?php

use Illuminate\Database\Seeder;

class PdvStatusAdquisicionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pdv_status_adquisicions')->insert([
        	[
        		'status' => 'autorizada'
        	],
        	[
        		'status' => 'traspazo'
        	],	
        ]);
    }
}
