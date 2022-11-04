<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use App\Models\Anuncio;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\QueryException;


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
    
//     public function update(Request $request, $id)
//     {
        
        
//         $dato['role_id'] = $request->only('role_id');
        
//         $usuario = User::findOrFail($id);
        
//         $roles = Role_user::orderBy('id','DESC')->paginate(10);
        
        
        
//         if($request->user()->cant('update',$usuario))
//             abort(401, 'No puedes actualizar el rol del usuario ');
//             foreach ($roles as $role){
//                 if($role->user_id == $usuario->id){
                    
//                     $role->update($dato);
//                 }
//             }
          
//         $usuario->update($request->all());
            
//        return back()->with('success',"Usuario  $user->id actualizado");
//     }
    
    
    public function deletedBikes(){
        
        $anuncios = Anuncio::onlyTrashed()->paginate(config('paginate.anuncios',10));
        
        return view('admin.bikes.deleted',['anuncios'=>$anuncios]);
    }
    
    
    
    public function restore(int $id){
        
        $anuncio = Anuncio::withTrashed()->find($id);
        
        $anuncio->restore();
        
        return back()->with(
            'success', "Anuncio $anuncio->titulo restaurado correctamente.");
    }
    
    public function purgue(Request $request ){
        
        $anuncio = Anuncio::withTrashed()->find($request->input('anuncio_id'));
        
        
        if($anuncio->forceDelete() && $anuncio->imagen){
            Storage::delete(config('filesystems.bikesImagenDir').'/'.$anuncio->imagen);
            
        }
        
        return back()
        ->with('success',"Moto $anuncio->titulo eliminada definitivamente.");
    }
    
    
    public function userList(){
        
        $users = User::orderBy('name','ASC')->paginate(config('pagination.users',10));
    
         return view('admin.users.list',['users'=>$users]);
    }
    
    public function userShow(User $user){
        
        return view('admin.users.show',['user'=>$user]);
    }
    
    public function userSearch(Request $request) {
        $request->validate([
            
            'name'=>'max:32',
            'email'=>'max:32',
            
        ]);
        
        $name=$request->input('name','');
        $email=$request->input('email','');
        
        $users= User::orderBy('name','ASC')
            ->where('name','like',"%$name%")
            ->where('email','like',"%$email%")
            ->paginate(config('pagination.users'))
            ->appends(['name'=>$name,'email'=>$email]);
        
        return view('admin.users.list',['users'=>$users,'name'=>$name,'email'=>$email]);
    }
    
    public function setRole(Request $request){
        
        $role = Role::find($request->input('role_id'));
        $user = User::find($request->input('user_id'));
        
        try{
            $user->roles()->attach($role->id,[
             'created_at'  => now(),
             'updated_at' => now()
            ]);
            
            return back()->with('success',"Role $role->role añadido a $user->name correctamente.");
        }catch(QueryException $e){
            return back()
            ->withErrors("No se puede añadir el rol $role->role a $user->name. Es posible que ya lo tenga.");
        }
     
    }
    
    
    public function removeRole(Request $request){
        
        $role = Role::find($request->input('role_id'));
        $user = User::find($request->input('user_id'));
        try{
            $user->roles()->detach($role->id);
            
            return back()->with('success',"Role $role->role quitado a $user->name correctamente.");
        }catch(QueryException $e){
            return back()
            ->withErrors("No se puede quitar el rol $role->role a $user->name. Es posible que ya lo tenga.");
        }
        
        
    }
}


