<?php

namespace App\Http\Controllers;

use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Sekolah;
use App\Models\Poll;
use App\Models\PollOption;
use App\Models\PollVote;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class UserController extends Controller
{

    public function senarai(Request $request) {
        $users = User::all();
        return view('users', compact('users'));
    }

    public function satu(Request $request) {
        $user_id = (int)$request->route('user_id');
        $user = User::find($user_id);
        return view('user', compact('user'));
    }    

    public function daftar(Request $request) {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));  
        $is_api_request = $request->route()->getPrefix() === 'api';
        if($is_api_request) {
            return $user->toJson(JSON_PRETTY_PRINT);   
        } else {
            Alert::success('Success Title', 'Success Message');
            return back();
        }
    }

    public function kataluan(Request $request) {
        $user = $request->user();
        $user->password = Hash::make($request->password);
        $user->save();
        $is_api_request = $request->route()->getPrefix() === 'api';
        if($is_api_request) {
            return $user->toJson(JSON_PRETTY_PRINT);   
        } else {
            Alert::success('Success Title', 'Success Message');
            return back();
        }        
    }

    public function token(Request $request) {
        $token = $request->user()->createToken($request->token_name);
        return ['token' => $token->plainTextToken];        
    }   

    public function borang(Request $request) {
        return view('borang');
    }

}
