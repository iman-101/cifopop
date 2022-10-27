@extends('layouts.master')
@section('titulo','') 
@section('contenido')


        <div class="m-10">
            <div class="content" style="text-align:center">
                <div class="title mt-5" style="font-size:3rem">
                   ERROR 401 prohibido :)
                </div>
                <div class="title mb-5" style="font-size:2rem">
                   {{$exception->getMessage()}}
                </div>
                
                    <img class="rounded" 
                             alt="Imagen"
                       
                         src="{{asset('img/stop.jpg')}}">
            </div>
        </div>   
        
           
    @endsection
   @section('enlaces')
      @parent
      <a href="{{route('bikes.index')}}"  class="btn btn-primary m-2">Garaje</a>
      
   @endsection