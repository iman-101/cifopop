@extends('layouts.master')
@section('titulo',"Contactar con Cifopop") 
@section('contenido')

<div class="container">

    <div class="row bg-white">
        <form class="col-7 my-2  p-4" method="POST" action="{{route('contacto.email')}}">
           {{csrf_field()}}
            <div class="form-group row">
                 <label for="inputEmail" class="col-sm-2 col-form-label" >Email</label>
                 <input name="email" type="email" class="up form-control" id="inputEmail"
                 palceholder="Email" maxlength="255" value="{{old('email')}}" required>
            
            </div>
            <div class="form-group row">
                 <label for="inputNombre" class="col-sm-2 col-form-label" >Nombre</label>
                 <input name="nombre" type="text" class="up form-control" id="inputNombre"
                 palceholder="Nombre" maxlength="255" value="{{old('nombre')}}" required>
            </div>
            
            <div class="form-group row">
                 <label for="inputAsunto" class="col-sm-2 col-form-label" >Asunto</label>
                 <input name="asunto" type="text" class="up form-control" id="inputAsunto"
                 palceholder="Asunto" maxlength="255" value="{{old('asunto')}}" required>
            </div>
              
            <div class="form-group row">
                 <label for="inputMensaje" class="col-sm-2 col-form-label" >Mensaje</label>
                 <input name="mensaje" type="text" class="up form-control" id="inputMensaje"
                 palceholder="Mensaje" maxlength="2048" value="{{old('mensaje')}}" required>
            </div>
            
              
            <div class="form-group row">
                 <button type="submit" class="btn btn-success m-2 mt-5">Enviar</button>
                 <button type="reset" class="btn btn-secondary m-2 mt-5">Borrar</button>
            </div>
        </form>
      
            <iframe  class="col-5 my-2 border p-3" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2985.647800714416!2d2.055835615759578!3d41.55522247924925!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x12a493650ae03931%3A0xee4ac6c8e8372532!2sCIFO%20Sabadell!5e0!3m2!1ses!2ses!4v1664981470694!5m2!1ses!2ses" 
               style="min-width:300px; min-height:300px;"  loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
   
    
    </div>
 </div>
   @endsection
 