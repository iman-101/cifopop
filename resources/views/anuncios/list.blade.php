@extends('layouts.master')
@section('log')
@section('titulo','Lista de anuncios') 
@section('contenido')


           
           <div class="row">
              <div class="col-6 test-start">{{ $anuncios->links() }} </div>
              @auth
            <div class="col-6 text-end">
            
                <p>Nueva moto <a href="{{route('anuncio.create')}}" class="btn btn-success ml-2">+</a></p>
            </div>
            @endauth
            
          
            
            
            
            <table class="table table-striped table-bordered">
              <tr>
                <th>Id</th>
                <th>Titulo</th>
                <th>Descripcion</th>
              
              
              </tr>
            
              @forelse($anuncios as $anuncio)
              <tr>
                  <td>{{$anuncio->id}}</td>
             
            
                  <td>{{$anuncio->titulo}}</td> 
                  <td>{{$anuncio->descripicion}}</td>
                
                       @auth
                       @if(Auth::user()->can('update',$anuncio))
                        <a  href="{{route('anuncio.edit',$anuncio->id)}}">
                         <img height="30" width="30" src="{{asset('img/buttons/update.png')}}"></a>
                       @endif
                       
                       @if(Auth::user()->can('delete',$anuncio))
                        <a  href="{{route('anuncio.delete',$anuncio->id)}}">
                         <img height="30" width="30" src="{{asset('img/buttons/delete.png')}}"
                          alt="Borrar" title="Borrar">
                       </a>
                       @endif
                       @endauth
                    </td>
                    </tr>
              
                      
               @empty
                 <tr>
                    <td colspan="4">No hay resultados que mostrar</td>
                   
                 </tr>
                     
                 @endforelse
             
            </table>
            <div class="btn-group" role="group" label="Links">
                <a href="{{url('/')}}" class="btn btn-primary mr-2">Inicio</a>
            </div>
           </div>
           
    @endsection
   @section('enlaces')
      @parent
      <a href="{{route('anuncio.index')}}"  class="btn btn-primary m-2">Anuncio</a>
      
   @endsection