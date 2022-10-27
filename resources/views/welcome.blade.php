@php($pagina='portada')
@extends('layouts.master')

@section('titulo','Lista de anuncios') 

@section('contenido')
    <h1>Bienvenido</h1>
           
@endsection
@section('enlaces')
@parent
      <a href="{{route('anuncio.index')}}"  class="btn btn-primary m-2">Anuncio</a>
      
@endsection
             

