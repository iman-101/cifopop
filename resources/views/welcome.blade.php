@php($pagina='portada')
@extends('layouts.master')



@section('contenido')
           <div class="container-flex position-relative">
               <div class="position-absolute bottom-50 end-50">
                  @section('titulo','Bienvenido a Cifopop')
               
               
               </div> 
                        
               <figure class="">
                   <img class="d-block w-100" 
                   src="{{asset('img/home.jpg')}}" 
                   alt="Moto de Canela en Akira" >
               
               </figure>
             
             
           </div>
   
       
      
       </div>
@endsection

@section('enlaces')
@parent
      <a href="{{route('anuncio.index')}}"  class="btn btn-primary m-2">Anuncio</a>
      
@endsection
             

