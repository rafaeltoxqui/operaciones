<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PdvComment as Comment;
use App\pdv as PDV;

class CommentController extends Controller
{
    public function create(Request $request){
        if($request->comment == '' || $request->comment == NULL){
            $request->comment = "THE PDV WAS MODIFIED";
        }
    	$newComment = new Comment();
        $newComment->id_pdv = $request->idPdv;
    	$newComment->comment = $request->comment;
    	$newComment->save();
    	return json_encode(['message' => 'TRUE']);
    }

    public function showJ(Request $request){
    	$coments = Comment::where('id_pdv','=',$request->id)->orderBy('id', 'DESC')->take(5)->get();
    	return $coments;
    }
}
