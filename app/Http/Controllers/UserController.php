<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        $data['results']=User::paginate(10);
        return view('user.index',$data);
    }
    public function register(Request $request)
    {
        if($request->isMethod('post'))
        {
            $validated=$request->validate([
                'name'=>'required',
                'email' =>'required|email|unique:users,email',
                'phone' =>'numeric|digits:10|required',
                'role'=>'required',
                'password'=>'required'
            ]);

            $ins_arr=array(
                'name'=>$validated['name'],
                'email'=>$validated['email'],
                'phone'=>$validated['phone'],
                'role'=>$validated['role'],
                'password'=>bcrypt($validated['password'])
            );

            user::create($ins_arr);

            return redirect()->route('users')->with('success','User created successfully');
        }
        return view('user.register');
    }
    public function deactivate($id)
    {
        $user=decrypt($id);

        $editdata=User::find($user);

        $editdata->status=2;

        $editdata->save();

        return redirect('users')->with('User deactivated successfully');
    }
    public function activate($id)
    {
         $user=decrypt($id);

        $editdata=User::find($user);

        $editdata->status=1;
        
        $editdata->save();

        return redirect('users')->with('User activated successfully');
    }
}
