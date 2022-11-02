@extends('layouts.master')
@section('log')


@section('contenido')

   
        <div class="container">
           <div class="row">
             
            
            
            <form method="GET" action="{{route('anuncio.search')}}" class="col-12 row"
            >
             
            
               <input name="titulo" type="text" class="col form-control mr-2 mb-2"
               placeholder="titulo" maxlength="16" requied value="{{empty($titulo)? '' : $titulo}}">
               
                <input name="descripicion" type="text" class="col form-control mr-2 mb-2"
               placeholder="descripcion" maxlength="16"  value="{{empty($descripicion)? '' : $descripicion}}">
              
               <button type="submit" class="col btn btn-primary mr-2 mb-2">Buscar</button>
               <a href="{{route('anuncio.index')}}">
                  <button type="button" class="col btn btn-primary mb-2">Quitar filtro</button>
               
               </a>
            </form>
            
            
            
            <div class="container d-flex justify-content-around flex-wrap">
            
               @forelse($anuncios as $anuncio)
              
               <div class="card shadow" style="width: 300px;margin: 10px;padding: 20px">
                 
                    <img class="card-img-top" style="max-width:80%"
                     
                     alt="Imagen de {{$anuncio->titulo}}"
                     titule="Image de {{$anuncio->titulo}}"
                     src="{{$anuncio->imagen? asset('storage/'.config('filesystems.bikesImageDir')).'/'.$anuncio->imagen:
                          asset('storage/'.config('filesystems.bikesImageDir')).'/default.png'}}">
                  <div class="card-body">
                    <h5 class="card-title">ID: {{$anuncio->id}}</h5>
                    <p class="card-text">{{$anuncio->descripicion}}</p>
                    <a href="{{route('anuncio.show',$anuncio->id)}}" 
                    class=""><img height="30" width="30" src="{{asset('img/buttons/show.png')}}"
                          alt="Ver detalles" title="Ver detalles">
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