@extends('layouts.master')
@section('log')
@section('titulo',"Actualizacion  de la anuncio $anuncio->titulo ") 
@section('contenido')

           
                 <form class="my-2 border p-5" method="POST" action="{{route('anuncio.update',$anuncio->id)}}" enctype="multipart/form-data">
              
                 {{csrf_field()}}
                 <input type="hidden" name="_method" value="PUT">
                 <div class="form-group row">
                      <label for="inputMarca" class="col-sm-2 col-form-label">Titulo</label>
                 
                        <input name="titulo" type="text" class="up form-control col-sm-10" 
                        id="inputMarca" placeholder="Marca" maxlength="255" value="{{$anuncio->titulo}}" >
                 </div>
              
                 <div class="form-group row">
                      <label for="inputmodelo" class="col-sm-2 col-form-label">Precio</label>
                 
                        <input name="precio" type="text" class="up form-control col-sm-10" 
                        id="inputPrecio" placeholder="Precio" maxlength="255" value="{{$anuncio->precio}}" >
                 </div>
                 
                 
              
                <div class="form-group row">
                      <label for="inputkms" class="col-sm-2 col-form-label">Descripcion</label>
                 
                        <input name="descripicion" type="text" class="up form-control col-sm-10" 
                        id="inputKms" placeholder="DEscripicin" value="{{$anuncio->descripicion}}" >
                 </div>
                
                <div class="form-group row">
                   <div class="col-sm-9">
                      <label for="inputImage" class="col-sm-2 col-form-label">
                      {{$anuncio->imagen? 'Sustituir': 'Añadir'}} imagen
                      </label>
                 
                        <input name="imagen" type="file" class="form-control-file" 
                        id="inputImagen" >
                      
                    </div>
                    <div class="col-sm-3">
                       <label>Imagen actual:</label>
                      <img class="rounded img-thumbnail my-3"
                         alt="Imagen de {{$anuncio->titulo}} "
                           title="Imagen de {{$anuncio->titulo}}"
                           src="{{$anuncio->imagen? asset('storage/'.config('filesystems.bikesImageDir')).'/'.$anuncio->imagen:
                          asset('storage/'.config('filesystems.bikesImageDir')).'/default.png'}}">
                    </div>
                 </div>
                 
                 
                 <div class="form-group row">
                     
                      <button type="submit" class="btn btn-success m-2 mt-5">Guardar</button>
                      <button type="reset" class="btn btn-secondary m-2 ">Restablecer</button>
                 </div>
              </form>
             <script>
              
                 inputMatricula.disabled =!chkMatriculada.checked;
                 
                 chkMatriculada.onchange=function(){
                     inputMatricula.disabled = !chkMatriculada.checked;
                 }
                 
                 inputColor.disabled =!chkColor.checked;
                 
                 chkColor.onchange=function(){
                     inputColor.disabled = !chkColor.checked;
                 }
              
              </script>
           
           <div class="text-end my-3">
              <div class="btn-group mx-2">
                 <a class="mx-2" href="{{route('anuncio.show',$anuncio->id)}}">
                 <img height="50" width="50" src="{{asset('img/buttons/show.png')}}"
                    alt="Detalles" title="Detalles">
                 </a>
                 
                  <a class="mx-2" href="{{route('anuncio.delete',$anuncio->id)}}">
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