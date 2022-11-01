@extends('layouts.master')
@section('log')
@section('titulo',"Confirmación de borrado de $anuncio->titulo") 
@section('contenido')
           
                 <form class="my-2 border p-5" method="POST" action="{{route('oferta.destroy',$oferta->id)}}">
              
                 {{csrf_field()}}
                 <input type="hidden" name="_method" value="DELETE">
                 abel for="confirmdelete" class="col-sm-2 col-form-label">Confirmar el borrado de
                   {{$anuncio->titulo}}: </label>
         
              
                <input type="submit" value="Borrar" class="btn btn-danger m-4" id="confirmdelete" >
              </form>
           
              
           
   @endsection
   @section('enlaces')
      @parent
      <a href="{{route('oferta.index')}}"  class="btn btn-primary m-2">Oferta</a>
      <a href="{{route('oferta.show', $anuncio->id)}}"  class="btn btn-primary m-2">Regresar a detalles de la moto</a>
      
   @endsection