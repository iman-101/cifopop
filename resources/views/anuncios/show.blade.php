@extends('layouts.master')
@section('log')
@section('titulo',"Detalles del anuncio $anuncio->titulo  ") 
@section('contenido')


           
                <table class="table table-striped table-bordered">
              <tr>
                <td>ID</td>
                <td>{{$anuncio->id}}</td>
             </tr>
             <tr>
                <td>Modelo</td>
                <td>{{$anuncio->titulo}}</td>
              </tr>
                <tr>
              <td>Propietario</td>
                <td>{{$anuncio->user? $anuncio->user->name : 'Sin propietario'}}</td>
              </tr>
              <tr>
              
                  <td>Precio</td>
                  <td>{{$anuncio->precio}}</td>
              </tr>
                <tr>
              
                  <td>Descripción</td>
                  <td>{{$anuncio->descripicion}}</td>
              </tr>
             
             
         
               
          
              <tr>
                <td>Imagen</td>
                 <td>
                    <img class="rounded" style="max-width:400px"
                    
                    alt="Imagen de {{$anuncio->titulo}} "
                    title="Imagen de {{$anuncio->titulo}} "
                    src="{{$anuncio->imagen? 
                     asset('storage/'.config('filesystems.bikesImageDir')).'/'.$anuncio->imagen:
                        asset('storage/'.config('filesystems.bikesImageDir')).'/default.png'}}">
                 
                 </td>
              
              
              </tr>
              
             </table>
              <div class="text-end my-3">
                    <div class="btn-group mx-2">
                    
                       <a  href="{{route('anuncio.show',$anuncio->id)}}">
                         <img height="20" width="20" src="{{asset('img/buttons/show.png')}}"
                          alt="Ver detalles" title="Ver detalles">
                       </a>
                       
                        <a  href="{{route('anuncio.edit',$anuncio->id)}}">
                         <img height="20" width="20" src="{{asset('img/buttons/update.png')}}"
                          alt="Modificar" title="Modificar">
                       </a>
                       
                        <a  href="{{route('anuncio.delete',$anuncio->id)}}">
                         <img height="20" width="20" src="{{asset('img/buttons/delete.png')}}"
                          alt="Borrar" title="Borrar">
                       </a>
                   </div>
             </div>
           
           

                @endsection
   @section('enlaces')
      @parent
      <a href="{{route('anuncio.index')}}"  class="btn btn-primary m-2">Garaje</a>
      
   @endsection