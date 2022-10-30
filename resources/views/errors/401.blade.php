@extends('layouts.master')
@section('titulo','') 
@section('contenido')

<div class="container">
        <div class="m-10">
            <div class="content" style="text-align:center">
                
                <div class="title mb-5" style="font-size:2rem">
                   {{$exception->getMessage()}}
                </div>
                
                    <img class="rounded" 
                             alt="Imagen"
                       
                         src="{{asset('img/401.jpg')}}">
            </div>
        </div>   
        
           
   @endsection
   @section('enlaces')
      @parent
      <a href="{{route('anuncio.index')}}"  class="btn btn-primary m-2">Garaje</a>
  </div>    
   @endsection