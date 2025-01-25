<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    function articleShow($id){
        $article= Article::findOrFail($id);
        return view('article',compact('article'));
     }
}
