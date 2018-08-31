<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PdvComment as Comment;

class CommentController extends Controller
{
    public function saveNewComment(Request $request){
    	$newComment = new Comment();
    	$newComment->comment = $request->comentario;
    	$newComment->save();
    	return TRUE;
    }
}
