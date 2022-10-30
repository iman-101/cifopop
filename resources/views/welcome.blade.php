@php($pagina='portada')
@extends('layouts.master')

 

@section('contenido')
   

@section('enlaces')
@parent
      <a href="{{route('anuncio.index')}}"  class="btn btn-primary m-2">Anuncio</a>
      
@endsection
             

