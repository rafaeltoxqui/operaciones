<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PdvComment as Comment;
use App\pdv as PDV;

class CommentController extends Controller
{
    public function create(Request $request){
        if($request->comment == '' || $request->comment == NULL){
            $request->comment = "PDV Modification";
        }
    	$newComment = new Comment();
        $newComment->id_pdv = $request->idPdv;
    	$newComment->comment = $request->comment;
    	$newComment->save();
    	return json_encode(['message' => 'TRUE']);
    }

    public function showJ(Request $request){
    	$coments = Comment::where('id_pdv','=',$request->id)->get();
    	return $coments;
    }
}
