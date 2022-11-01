<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use App\Models\Role_user;

class AdminController extends Controller
{
  
    
    public function index()
    {
        $usuarios = User::orderBy('id','DESC')->paginate(10);
        
        $total = User::count();
        
        return view('admin.list',['usuarios'=>$usuarios, 'total'=>$total]);
    }
    
    
    public function edit($id)
    {
        
        $usuario = User::findOrFail($id);
        return view('admin.updateUser',['usuario'=>$usuario]);
    }
    
    public function update(Request $request, $id)
    {
        
        
        $dato['role_id'] = $request->only('role_id');
        
        $usuario = User::findOrFail($id);
        
        $roles = Role_user::orderBy('id','DESC')->paginate(10);
        
        
        
        if($request->user()->cant('update',$usuario))
            abort(401, 'No puedes actualizar el rol del usuario ');
            foreach ($roles as $role){
                if($role->user_id == $usuario->id){
                    
                    $role->update($dato);
                }
            }
          
        $usuario->update($request->all());
            
       return back()->with('success',"Usuario  $user->id actualizado");
    }
}
