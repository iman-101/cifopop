@extends('layouts.master')
@section('log')

@section('titulo',"Detalles del usuario $user->name")
@section('contenido')

     <div class="container">
     
     
          <table class="table">
          <tr>
               <td>ID</td>
          
               <td>{{$user->name}}</td>
          </tr>
          
            <tr>
               <td>Nombre</td>
          
               <td>{{$user->name}}</td>
          </tr>
            <tr>
               <td>ID</td>
          
               <td>{{$user->id}}</td>
          </tr>
          
          <tr>
               <td>Email</td>
          
               <td><a href="mailto:{{$user->email}}">{{$user->name}}</a></td>
          </tr>
           <tr>
               <td>Fecha de alta</td>
          
               <td>{{$user->created_at}}</td>
          </tr>
          
           <tr>
               <td>Fecha de verificación</td>
          
               <td>{{$user->verified_at?? 'Sin verificar'}}</td>
          </tr>
          
          <tr>
               <td>Roles</td>
          
               <td>
               @foreach($user->roles as $rol)
                  -{{ $rol->rol}}
              @endforeach
              </td>
              
          </tr>
          
          <tr>
             <td>Añadir rol</td>
              <td>
               <form method="POST" action="{{route('admin.user.setRole')}}">
                  @csrf
                  <input  type="hidden" name="_method" value="post">
                  <input  type="hidden" name="user_id" value="{{ $user->id}}">
                  <select class="form-control w-50 d-inline" name="role_id">
                    @foreach($user->remainingRoles() as $rol)
                      <option value="{{$rol->id}}">{{$rol->rol}}</option>
                   @endforeach
                  </select>
                  <input type="submit" class="btn btn-success px-3 ml-1" value="Añadir">
               </form>
              </td>
          
          </tr>
       </table>
       
       
     
     
     
     
     </div>





@endsection