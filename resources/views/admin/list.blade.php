@extends('layouts.master')
@section('log')


@section('contenido')

   
        <div class="container">
           <table class="table">
               <tr>
                   <th>Id</th>
                  <th>Nombre</th>
                  <th>Apellidos</th>
                  <th>Email</td>
                  <th>Poblacio</th>
                  <th>Codigo postal</th>
                  <th></th>
               </tr>
               @forelse($usuarios as $usuario)
                 <tr>
                  <td>{{$usuario->id}}</td>
                  <td>{{$usuario->name}}</td>
                   <td>{{$usuario->apellidos}}</td>
                  <td>{{$usuario->email}}</td>
                 
                  <td>{{$usuario->poblacion}}</td>
                  <td>{{$usuario->cp}}</td>
                  <td>
                      @auth
                       
                        <a  href="{{route('usuario.edit',$usuario->id)}}">
                         <img height="30" width="30" src="{{asset('img/buttons/update.png')}}"></a>
                     
                       
                       
                        <a  href="{{route('usuario.delete',$usuario->id)}}">
                         <img height="30" width="30" src="{{asset('img/buttons/delete.png')}}"
                          alt="Borrar" title="Borrar">
                       </a>
                      
                      @endauth</a>
                    </td>
                  </tr>
              
                     
               @empty
                
                    <h2>No hay resultados que mostrar</h2>
                   
                 @endforelse
             
            </table>
           
           </div>
        
      @endsection
      
     </div>