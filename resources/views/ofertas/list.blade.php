@extends('layouts.master')
@section('log')


@section('contenido')

   
        <div class="container">
          
            
            
            
            <div class="container d-flex justify-content-around flex-wrap">
            
               @forelse($ofertas as $oferta)
              
               <div class="card shadow" style="width: 300px;margin: 10px;padding: 20px">
                 
                  
                  <div class="card-body">
                    <h5 class="card-title">{{$oferta->import}}</h5>
                    <p class="card-text">{{$oferta->text}}</p>
                    <p>{{$oferta->vigenciadate}}</p>
                    @if($oferta->acceptada != null)
                    <p>Oferta acceptada :{{$oferta->acceptada}}<img src="{{asset('img/acceptada.png')}}" width="40" height="40"></p>
                  
                 
                   @endif
                    @if($oferta->rechazada != null)
                         <p>Oferta rechazada: {{$oferta->rechazada}}</p>
                   @endif
                    <a href="{{route('oferta.show',$oferta->id)}}" 
                    class="">
                      @auth
                       @if(Auth::user()->can('update',$oferta))
                        <a  href="{{route('oferta.edit',$anuncio->id)}}">
                         <img height="30" width="30" src="{{asset('img/buttons/update.png')}}"></a>
                       @endif
                       
                       @if(Auth::user()->can('delete',$oferta))
                        <a  href="{{route('oferta.delete',$oferta->id)}}">
                         <img height="30" width="30" src="{{asset('img/buttons/delete.png')}}"
                          alt="Borrar" title="Borrar">
                        </a>
                       @endif
                     @endauth</a>
                  </div>
                </div>
              
                     
               @empty
                
                    <h2>No hay resultados que mostrar</h2>
                   
                 @endforelse
             
            </div>
           
          </div>
        
      @endsection
     
     </div>