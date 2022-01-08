<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
namespace App\Http\Controllers\Admin;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Mail\VipUserMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use App\User;
use App\VipToken;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;






class MailController extends Controller
{

    public function vipCreate()
    {

        if (Auth::User()->role == 'admin') {
        return view('admin.mails.vip');
        } else {
        return view('security');
        }
    }

    public function vipStore(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|string|email',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }



        if (Auth::User()->role == 'admin'){
            $presentUser = User::where('email', $request->email)->first();
            if (isset($presentUser)) {
                if ($presentUser->role == 'vip') {
                    $status = 'L\'utente richiesto è già VIP';
                } else {
                    $presentUser->role = 'vip';
                    $presentUser->save();
                    $status = 'L\'utente richiesto è stato aggiornato';
                }
            } else {
                $vipToken = new VipToken();

                $token = Str::random(45);
                while (VipToken::where('token', $token)->exists()) {
                    $token = Str::random(45);
                }

                $vipToken->token = $token;
                $vipToken->role = 'vip';
                $vipToken->save();

                Mail::to($request->email)->send(new VipUserMail($vipToken));

                $status = 'Invito mandato correttamente all\'indirizzo '.$request->email;

                
                
            }
            return view('admin.mails.vip')->with('status', $status);
        } else {

            return view('security');

        }
    }
}
