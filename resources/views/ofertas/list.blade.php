@extends('layouts.master')
@section('log')


@section('contenido')

   
        <div class="container">
          
            
            

           
              
             <table class="table">
               @forelse($ofertas as $oferta)
                  @if($loop->first)
                       <tr>
                       
                          <th>Import</th>
                          <th>Texto</th>
                          <th>data de vigencia</th>
                           <th>acceptada o rechazada</th>
                       </tr>
                @endif
               <tr>
                 
                  <td>{{$oferta->import}}</td>
                  <td>{{$oferta->text}}</td>
                  <td>{{$oferta->vigenciadate}}</td>
                    @if($oferta->acceptada != null)
                  <td>Oferta acceptada :<img src="{{asset('img/acceptada.png')}}" width="40" height="40"></td>
                  
                 
                   @endif
                    @if($oferta->rechazada != null)
                         <td>Oferta rechazada: <img src="{{asset('img/rechazada.png')}}" width="40" height="40"></td>
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
                </tr>
              
                     
               @empty
                
                    <h2>No hay resultados que mostrar</h2>
                   
                 @endforelse
             
           </table>
           
          </div>
        
      @endsection
     
     </div>