<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;


use Illuminate\Http\Request;

class UserController extends Controller
{
  public function index()
  {

    if (Auth::check()) {
      $user = Auth::user();

      return response()->json([
        'data' => $user,
        'success' => true,
      ]);

    } else {
      return response()->json([
        'success' => false,
      ]);
    }

  }

}
