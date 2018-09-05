<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PdvComment as Comment;
use App\pdv as PDV;

class CommentController extends Controller
{
    public function create(Request $request){
    	$newComment = new Comment();
    	$newComment->comment = $request->comentario;
    	$newComment->save();
    	return TRUE;
    }

    public function showJ(Request $request){
    	$idcomment = PDV::find($request->id);
    	$coments = Comment::where('id','=',$idcomment->id_pdv_comment)->get();
    	return $coments;
    }
}
