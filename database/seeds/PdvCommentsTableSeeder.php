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
                'id_pdv' => 1,
        		'comment' => 'Comentario de pruebas para cualquier punto de venta'
        	],
            [
                'id_pdv' => 1,
                'comment' => 'Comentario de pruebas para cualquier punto de venta'
            ],
            [
                'id_pdv' => 1,
                'comment' => 'Comentario de pruebas para cualquier punto de venta'
            ],
            [
                'id_pdv' => 2,
                'comment' => 'Comentario de pruebas para cualquier punto de venta'
            ],
            [
                'id_pdv' => 2,
                'comment' => 'Comentario de pruebas para cualquier punto de venta'
            ],
            [
                'id_pdv' => 2,
                'comment' => 'Comentario de pruebas para cualquier punto de venta'
            ],
            [
                'id_pdv' => 3,
                'comment' => 'Comentario de pruebas para cualquier punto de venta'
            ],
            [
                'id_pdv' => 3,
                'comment' => 'Comentario de pruebas para cualquier punto de venta'
            ],
            [
                'id_pdv' => 4,
                'comment' => 'Comentario de pruebas para cualquier punto de venta'
            ],
                                    [
                'id_pdv' => 4,
                'comment' => 'Comentario de pruebas para cualquier punto de venta'
            ],
            [
                'id_pdv' => 5,
                'comment' => 'Comentario de pruebas para cualquier punto de venta'
            ],
            [
                'id_pdv' => 5,
                'comment' => 'Comentario de pruebas para cualquier punto de venta'
            ],
            [
                'id_pdv' => 6,
                'comment' => 'Comentario de pruebas para cualquier punto de venta'
            ],
            [
                'id_pdv' => 6,
                'comment' => 'Comentario de pruebas para cualquier punto de venta'
            ],
            [
                'id_pdv' => 7,
                'comment' => 'Comentario de pruebas para cualquier punto de venta'
            ],
            [
                'id_pdv' => 7,
                'comment' => 'Comentario de pruebas para cualquier punto de venta'
            ],
            [
                'id_pdv' => 8,
                'comment' => 'Comentario de pruebas para cualquier punto de venta'
            ],
            [
                'id_pdv' => 8,
                'comment' => 'Comentario de pruebas para cualquier punto de venta'
            ],            
        ]);
    }
}
