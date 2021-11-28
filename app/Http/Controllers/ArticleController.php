<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Article;

use Illuminate\Http\Request;

class ArticleController extends Controller
{
  public function notLogged()
  {
      $articles = Article::where('visibility', '=', 1)->orderBy('created_at', 'DESC')->get();

      return response()->json([
        'data' => $articles,
        'success' => true,
      ]);
  }

  public function logged()
  {
      $articles = Article::orderBy('created_at', 'DESC')->get();

      return response()->json([
        'data' => $articles,
        'success' => true,
      ]);
  }

  public function articleBySlug(string $slug)
  {
    $article = Article::where('slug', '=', $slug)->first();

    return response()->json([
      'data' => $article,
      'success' => true,
    ]);

  }

  
  public function articleById(string $id)
  {
    $article = Article::where('id', '=', $id)->first();

    return response()->json([
      'data' => $article,
      'success' => true,
    ]);

  }



}