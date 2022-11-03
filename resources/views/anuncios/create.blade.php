@extends('layouts.master')

@section('log')
@section('titulo','Nuevo anuncio') 
@section('contenido')
      <div class="container">       
              <form class="my-2 border p-5" method="POST" action="{{route('anuncio.store')}}" enctype="multipart/form-data">
              
                 {{csrf_field()}}
                 <div class="form-group row">
                      <label for="inputTitulo class="col-sm-2 col-form-label">Titulo</label>
                       
                        <input name="titulo" type="text" class="up form-control col-sm-10" 
                        id="inputTitulo" placeholder="Titulo"  value="{{old('titulo')}}" >
                 </div>
              
                 <div class="form-group row">
                      <label for="inputDescripcion" class="col-sm-2 col-form-label">Descripción</label>
  
                        <textarea name="descripicion">...</textarea>
                 </div>
                 
                    <div class="form-group row">
                      <label for="inputPrecio" class="col-sm-2 col-form-label">Precio</label>
                 
                        <input name="precio" type="number" class="up form-control col-sm-10" 
                        id="inputPrecio" placeholder="Precio" maxlength="255" value="{{old('precio')}}"  required>
                 </div>
              
               
                  
                 
                  <div class="form-group row p-3 my-3 border bg-light">
                       <label for="inputImagen" class="col-sm-2 col-form-label">Imagen</label>
                       <input name="imagen" type="file" class="form-control-file col-sm-10" id="inputImagen">
                       
                  </div>
                  
                  
                  
                   
                  

                  
                 <div class="form-group row">
                     
                      <button type="submit" class="btn btn-success m-2 mt-5">Guardar</button>
                      <button type="reset" class="btn btn-secondary m-2 ">Borrar</button>
                 </div>
              </form>
         </div>   
   @endsection
   @section('enlaces')
      @parent
      <a href="{{route('anuncio.index')}}"  class="btn btn-primary m-2">Garaje</a>
      
   @endsection