<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Post;

use Illuminate\Http\Request;

class PostController extends Controller
{
  public function notLogged()
  {
      $posts = Post::where('visibility', '=', 1)->orderBy('created_at', 'DESC')->get();

      return response()->json([
        'data' => $posts,
        'success' => true,
      ]);
  }

  public function all(Request $request)
  {
    if ($request->logged){
      $posts = Post::orderBy('created_at', 'DESC')->get();

    } else {
      $posts = Post::where('visibility', '=', 1)->orderBy('created_at', 'DESC')->get();
    }

      return response()->json([
        'data' => $posts,
        'success' => true,
      ]);
  }


  public function logged()
  {
      $posts = Post::orderBy('created_at', 'DESC')->get();

      return response()->json([
        'data' => $posts,
        'success' => true,
      ]);
  }



  public function postBySlug(string $slug)
  {
    $post = Post::where('slug', '=', $slug)->first();

    return response()->json([
      'data' => $post,
      'success' => true,
    ]);

  }


}