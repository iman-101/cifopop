@extends('layouts.master')
@section('log')
@section('titulo',"Confirmación de borrado de $anuncio->titulo") 
@section('contenido')
           
                 <form class="my-2 border p-5" method="POST" action="{{route('anuncio.destroy',$anuncio->id)}}">
              
                 {{csrf_field()}}
                 <input type="hidden" name="_method" value="DELETE">
                <figure>
                    <figcaption>Imagen actual:</figcaption>
                    <img class="rounded" width="50"
                      alt="Imagen de {{$anuncio->titulo}}"
                      title="Imagen de {{$anuncio->titulo}}"
                      src="{{$anuncio->imagen? 
                       asset('storage/'.config('filesystems.bikesImageDir')).'/'.$anuncio->imagen:
                          asset('storage/'.config('filesystems.bikesImageDir')).'/default.png'}}">
                </figure>
                
               
              
                 
                <label for="confirmdelete" class="col-sm-2 col-form-label">Confirmar el borrado de
                   {{$anuncio->titulo}}: </label>
         
              
                <input type="submit" value="Borrar" class="btn btn-danger m-4" id="confirmdelete" >
              </form>
           
              
           
   @endsection
   @section('enlaces')
      @parent
      <a href="{{route('anuncio.index')}}"  class="btn btn-primary m-2">Anuncios</a>
      <a href="{{route('anuncio.show', $anuncio->id)}}"  class="btn btn-primary m-2">Regresar a detalles de la moto</a>
      
   @endsection