<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use Hash;
use App\Models\User;
class LoginController extends Controller
{
    public function index()
    {
        $countryCode = '+91';
        return view('auth.login',compact('countryCode'));
    }

    public function verifyLogin(Request $request)
    {

        // $request->validate([
        //     'email' => 'required|email',
        //     'password' => 'required',
        //     'device_name' => 'required',
        // ]);
    
        $user = User::where('mobile', $request->number)->first();
    
        if (! $user || ! Hash::check($request->password, $user->password)) {
            
            return response()->json(['msg'=>"Login error !!",'token'=>'']);
        }
        Auth::login($user);
        return redirect()->route('tickets');
        // return response()->json(['msg'=>"Login Successfull !!",'token'=>$user->createToken('MyApp')->plainTextToken]);

    }
}
