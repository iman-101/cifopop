@extends('layouts.master')
@section('log')

@section('titulo','Detalles del usuario $user->name')
@section('contenido')

     <div class="container">
     
     
          <table>
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
               {{$rol->role}}</td>
          </tr>
          
      </table>
     
     
     
     
     
     </div>





@endsection