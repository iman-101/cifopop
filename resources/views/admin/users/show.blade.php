@extends('layouts.master')
@section('log')

@section('titulo','Detalles del usuario $user->name')
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
          
               <td>{{$user->name}}</td>
          </tr>
          
          <tr>
               <td>Email</td>
          
               <td><a href="mailto:{{$user->email}}">{{$user->name}}</a></td>
          </tr>
          
          <tr>
               <td>Roles</td>
          
               <td>
               @foreach($user->roles as $rol)
              <span class="d-inline-block w-50">{{$rol->role}} </span> 
              <form class="d-inline-block p-1" method="POST"
                   action="{{route('admin.user.removeRole')}}">
              
              @csrf
              <input type="hidden" name="_method" value="DELETE">
               <input type="hidden" name="user_id" value="{{$user->id}}">
               <input type="hidden" name="role_id" value="{{$rol->id}}">
                  <input type="submit" class="btn"value="Eliminar">
               </form>
              @endforeach
              </td>
              
          </tr>
          <tr>
              <td>
                 <form method="POST" action="{{route('admin.users.setRole')}}">
                  @csrf
                  <input type="hidden" name="_method" value="post">
                  <input type="hidden" name="user_id" value="{{$user->id}}">
                  <select class="form-control w-50 d-inline" name="role_id">
                    @foreach($user->remainingRoles() as $rol)
                       <option value="{{$rol->id}}">{{$rol->role}}</option>
                  </select>
             
                    <input type="submit" class="btn btn-success px-3 ml-1" value="Añadir">
                 </form>
              
              
              </td>
          
          </tr>
      </table>
     
     
     
     
     
     </div>





@endsection