<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(Type $var = null)
    {
        $users = User::orderBy('name','asc')->paginate(10);
        return view('admin.user.index',compact('users'));
    }
    public function create()
    {
        return view('admin.user.create');
    }
    public function store(Request $request)
    {
        $this->validate($request,[
            'name'=>'required|string|max:255|unique:users',
            'email'=>'required|string|max:70',
            'password'=>'required|string|max:255'
        ]);
        $user=new User();
        $user->name=$request->name;
        $user->email=$request->email;
        $user->role=$request->role;
        $user->password=bcrypt($request->password);
        //return response()->json($user);
        $user->save();
        return redirect('panel/user')->with('Mensaje','Usuario agregado correctamente');
    }
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('admin.user.edit',compact('user'));
    }
    public function update(Request $request, $id)
    {
        //Validación
        $this->validate($request,[
            'name'=>'string|max:255',
            'email'=>'string|max:70',
            'password'=>'string|max:255'  
        ]);
        $user = User::find($id);
        $user->name=$request->name;
        $user->email=$request->email;
        $user->role=$request->role;
        //return response()->json($user); 
        $user->save();
        return redirect('panel/user')->with('Mensaje','Usuario actualizado correctamente');
    }
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect('panel/user')->with('Mensaje','Usuario eliminado correctamente');
    }
}
