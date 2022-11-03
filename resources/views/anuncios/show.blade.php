@extends('layouts.master')
@section('log')
@section('titulo',"Detalles del anuncio $anuncio->titulo  ") 
@section('contenido')

   <div class="container">
           
                <table class="table table-striped table-bordered bg-white">
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
              
                 <td>Propietario</td>
                 <td>{{$usuario->name}}
              </tr>
             
               <tr>
              
                 <td>Poblacion</td>
                 <td>{{$usuario->poblacion}}
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
        <h2>Sus ofertas</h2>   
               <table class="table table-striped table-bordered">
              <tr>
                <th>ID</th>
                <th>Import</th>
                <th>Text</th>
                <th>Data limite</th>
                <th></th>
               
                
              </tr>
            
              @forelse($ofertas as $oferta)
              <tr>
                  <td>{{$oferta->id}}</td>
                
                  <td>{{$oferta->import}}</td> 
                  <td>{{$oferta->text}}</td>
                  <td>{{$oferta->vigenciadate}}</td>
                  
                  
                  <td>
                  
                  @if($oferta->acceptada == null && $oferta->rechazada == null)
                     <form class="" method="POST" action="{{route('oferta.update2',$oferta->id)}}" >
              
                       {{csrf_field()}}
                       <input type="hidden" name="_method" value="PUT">
                       <input type="hidden" name="acceptada" value="{{date('Y/m/d')}}">
                       <button type="submit" class="btn btn-success m-2 mt-5" id="acceptar">Acceptada</button>
                     
                     </form>
                   
                     <form class="" method="POST" action="{{route('oferta.update2',$oferta->id)}}" >
              
                       {{csrf_field()}}
                       <input type="hidden" name="_method" value="PUT">
                       <input type="hidden" name="rechazada" value="{{date('Y/m/d')}}">
                       <button type="submit" class="btn btn-danger m-2 mt-5" id="acceptar">Rechazada</button>
                     
                     </form>
                     
                     @elseif($oferta->acceptada != null)
                        
                        Oferta acceptada
                        <img src="{{asset('img/acceptada.png')}}" width="40" height="40">
                        
                     @else 
                         Oferta rechazada
                          <img src="{{asset('img/rechazada.png')}}" width="40" height="40">
                     @endif
                  
                  </td> 
              </tr>
                  
                      
               @empty
                 <tr>
                    <td colspan="4">No hay resultados que mostrar</td>
                   
                 </tr>
                     
                 @endforelse
             
            </table>
            
            <script>
              
            
            </script>
</div>
 
   @endsection
  