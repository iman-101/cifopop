@extends('layouts.master')
@section('log')

@section('titulo','Lista de usuarios')
@section('contenido')

   
        <div class="container">
         
            <form method="GET" action="{{route('admin.users.search')}}" class="col-8 ">
               <div class="row">
                
                   <input name="name" type="text" class="col form-control mr-2 mb-2"
                   placeholder="Nombre" maxlength="16"  value="{{empty($name)? '': $name}}">
                   
                    <input name="email" type="text" class="col form-control mr-2 mb-2"
                   placeholder="Email" maxlength="16"  value="{{empty($email)? '': $email }}">
                  
                   <button type="submit" class="col btn btn-primary mr-2 mb-2">Buscar</button>
                   <a href="{{route('admin.users')}}">
                      <button type="button" class="col btn btn-primary mb-2">Quitar filtro</button>
                   
                   </a>
                </div>
            </form>
          
      {{--  <div>{{ $users->links}}</div>--}}
           <table class="table table-striped table-bordred">
               <tr>
                   <th>Id</th>
                  <th>Nombre</th>
                  <th>Apellidos</th>
                  <th>Email</td>
                  <th>Fecha de alta</th>
                  <th>Roles</th>
                  <th>Operaciones</th>
               </tr>
               @forelse($users as $usuario)
                 <tr>
                  <td>{{$usuario->id}}</td>
                  <td><a href="{{route('admin.user.show',$usuario->id)}}">{{$usuario->name}}</a></td>
                   <td>{{$usuario->apellidos}}</td>
                  <td>
                      <a href="mailtro:{{$usuario->email}}">{{$usuario->email}}</td>
                 
                  <td>{{$usuario->created_at}}</td>
                  <td class="text-center">
                  @foreach($usuario->roles as $rol)
                             {{$rol->role}}
                             
                   @endforeach          
                  </td>
                  <td class="text-center">
                  
                       
                        <a  href="{{route('admin.user.show',$usuario->id)}}">
                         <img height="30" width="30" src="{{asset('img/buttons/show.png')}}">
                        </a>
                     
                  
                    </td>
                  </tr>
              
                @endforeach
                
                
             
             
            </table>
              
           </div>
        
     
      
     </div>
      @endsection