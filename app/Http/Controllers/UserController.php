<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\VipToken;
use App\User;
use Illuminate\Support\Str;


use Illuminate\Support\Facades\Hash;


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

  public function invitationStore(Request $request)
  {
    $validator = Validator::make($request->all(), [
      'name' => ['required', 'string', 'max:45'],
      'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
      'password' => ['required', 'string', 'min:8', 'confirmed'],
      'token' => ['required', 'string'],
    ]);


    if ($validator->fails()) {
      return redirect()->back()->withErrors($validator)->withInput();
    } else {
      $user = New User;
      $user->name = $request->input('name');
      $user->email = $request->input('email');
      $user->password = Hash::make($request->input('password'));
      $user->api_token = Str::random(60);


      if (VipToken::where('token', '=', $request->input('token'))->exists()) {
        $user->role = 'vip';
        $status = 'Congratulazioni! Sei un utente VIP!';

        VipToken::where('token', $request->token)->delete();

        
      } else {
        $user->role = 'standard';
        $status = 'L\'invito è scaduto. Sei un utente standard. Contattaci per ricevere informazioni.';
      }
      
      $user->save();

      $credentials = array(
        'email' => $request->input('email'),
        'password' => $request->input('password'),
      );

      if (Auth::attempt($credentials)) {
        return view('welcome')->with('status', $status);
      }




    }
  }

}
