@extends('layouts.master')
@section('log')
@section('titulo',"Actualizacion  de la oferta $oferta->id ") 
@section('contenido')

           
                 <form class="my-2 border p-5" method="POST" action="{{route('oferta.update',$oferta->id)}}" >
              
                 {{csrf_field()}}
                 <input type="hidden" name="_method" value="PUT">
               
                 
                 
                     <div class="form-group row">
                       <label for="inputDescripcion" class="col-sm-2 col-form-label">Texto</label>
  
                        <input name="text" type="text" class="up form-control col-sm-10" 
                        id="inputText" placeholder="Text" value="{{$oferta->text}}"  >
                     </div>
                         
                    <div class="form-group row">
                      <label for="inputPrecio" class="col-sm-2 col-form-label">Importe</label>
                      
                        <input name="import" type="number" class="up form-control col-sm-10" 
                        id="inputimport" placeholder="import" maxlength="255" value="{{$oferta->import}}"  required>
                  </div>
                         
                   <div class="form-group row">
                      <label for="inputvigenciadate" class="col-sm-2 col-form-label">Data de vigencia</label>
                 
                        <input name="vigenciadate" type="date" class="up form-control col-sm-10" 
                        id="inputvigenciadate"  value="{{$oferta->vigenciadate}}" >
                 </div>
                 
                 
                 <div class="form-group row">
                     
                      <button type="submit" class="btn btn-success m-2 mt-5">Actualizar</button>
                      <button type="reset" class="btn btn-secondary m-2 ">Restablecer</button>
                 </div>
              </form>
             
           
           <div class="text-end my-3">
              <div class="btn-group mx-2">
                 <a class="mx-2" href="{{route('oferta.show',$oferta->id)}}">
                 <img height="50" width="50" src="{{asset('img/buttons/show.png')}}"
                    alt="Detalles" title="Detalles">
                 </a>
                 
                  <a class="mx-2" href="{{route('anuncio.delete',$oferta->id)}}">
                 <img height="50" width="50" src="{{asset('img/buttons/delete.png')}}"
                    alt="Borrar" title="Borrar">
                 </a>
              </div>
           
           </div>
         
   @endsection
   @section('enlaces')
      @parent
      <a href="{{route('anuncio.index')}}"  class="btn btn-primary m-2">Anuncios</a>
      
   @endsection