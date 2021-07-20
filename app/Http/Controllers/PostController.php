<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Post;

use Illuminate\Http\Request;

class PostController extends Controller
{
  public function index()
  {
      return response()->json([Auth::check()]);

      $posts = Post::where('visibility', '=', 1)->get();

      return response()->json([
        'data' => $posts,
        'success' => true,
      ]);
  }

  public function logged()
  {
      $posts = Post::all();

      return response()->json([
        'data' => $posts,
        'success' => true,
      ]);
  }

}
