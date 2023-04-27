<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    
    public function login(Request $request)
    {
        if($request->isMethod('post'))
        {
            $credentials=array(
                'email'=>$request->email,
                'password'=>$request->password,
                'status'=>1
            );

            if(auth()->attempt($credentials))
            {
                return redirect()->route('dashbord');
            }else{
                return redirect()->route('login')->with('danger','Invalid credentials/Inactivated User');
            }
        }
        return view('login');
    }
    public function logout()
    {
        auth()->logout();
        
        return redirect()->route('login');
    }
}
