@extends('layouts.master')
@section('log')


@section('contenido')

   
        <div class="container">
          
             <table class="table">
                   <tr>
                          <th>ID user</th>
                          <th>Import</th>
                          <th>Texto</th>
                          <th>data de vigencia</th>
                           <th>acceptada o rechazada</th>
                           <th>Operacion</th>
                       </tr>
            @if(!Auth::user()->hasRole('editor') && !Auth::user()->hasRole('administrador'))
               @forelse($ofertas as $oferta)
                  
               <tr>
                 <td>{{$oferta->user_id}}
                  <td>{{$oferta->import}}</td>
                  <td>{{$oferta->text}}</td>
                  <td>{{$oferta->vigenciadate}}</td>
                     @if($oferta->acceptada != null)
                      <td>Oferta acceptada :<img src="{{asset('img/acceptada.png')}}" width="40" height="40">
                      </td>
                  
                 
                     
                    @elseif($oferta->rechazada != null)
                       <td>Oferta rechazada: <img src="{{asset('img/rechazada.png')}}" width="40" height="40"></td>
                    
                    @else
                       <td>Null</td>
                    @endif
                   <td> <a href="{{route('oferta.show',$oferta->id)}}" 
                    class=""><img height="30" width="30" src="{{asset('img/buttons/show.png')}}"></a></a>
                      @auth
                       @if(Auth::user()->can('update',$oferta))
                        <a  href="{{route('oferta.edit',$oferta->id)}}">
                         <img height="30" width="30" src="{{asset('img/buttons/update.png')}}"></a>
                       @endif
                       
                       @if(Auth::user()->can('delete',$oferta))
                        <a  href="{{route('oferta.delete',$oferta->id)}}">
                         <img height="30" width="30" src="{{asset('img/buttons/delete.png')}}"
                          alt="Borrar" title="Borrar">
                        </a>
                       @endif
                     @endauth</a>
                     </td>
                </tr>
              
                     
               @empty
                
                    <h2>No hay resultados que mostrar</h2>
                   
                 @endforelse
                 
                 
                 
                 
                 
                 
           @else
                @forelse($ofertasT as $oferta)
                  
               <tr>
                 <td>{{$oferta->user_id}}
                  <td>{{$oferta->import}}</td>
                  <td>{{$oferta->text}}</td>
                  <td>{{$oferta->vigenciadate}}</td>
                     @if($oferta->acceptada != null)
                      <td>Oferta acceptada :<img src="{{asset('img/acceptada.png')}}" width="40" height="40">
                      </td>
                  
                 
                    
                    @elseif($oferta->rechazada != null)
                       <td>Oferta rechazada: <img src="{{asset('img/rechazada.png')}}" width="40" height="40"></td>
                   
                    @else
                    
                      <td>Null</td>
                    @endif
                   <td> <a href="{{route('oferta.show',$oferta->id)}}" 
                    class=""><img height="30" width="30" src="{{asset('img/buttons/show.png')}}"></a></a>
                      @auth
                       @if(Auth::user()->can('update',$oferta))
                        <a  href="{{route('oferta.edit',$oferta->id)}}">
                         <img height="30" width="30" src="{{asset('img/buttons/update.png')}}"></a>
                       @endif
                       
                       @if(Auth::user()->can('delete',$oferta))
                        <a  href="{{route('oferta.delete',$oferta->id)}}">
                         <img height="30" width="30" src="{{asset('img/buttons/delete.png')}}"
                          alt="Borrar" title="Borrar">
                        </a>
                       @endif
                     @endauth</a>
                     </td>
                </tr>
              
                     
               @empty
                
                    <h2>No hay resultados que mostrar</h2>
                   
                 @endforelse
           
              
           @endif
           </table>
           
          </div>
        
      @endsection
     
     </div>