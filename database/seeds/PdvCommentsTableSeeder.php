<?php

use Illuminate\Database\Seeder;

class PdvCommentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pdv_comments')->insert([
        	[
        		'comment' => 'Comentario de pruebas para cualquier punto de venta'
        	]
        ]);
    }
}
