@extends('layouts.master')
@section('log')
@section('titulo',"Detalles de la oferta $oferta->id  ") 
@section('contenido')

   <div class="container">
           
                <table class="table table-striped table-bordered">
              <tr>
                <td>ID</td>
                <td>{{$oferta->id}}</td>
             </tr>
             <tr>
                <td>Texto</td>
                <td>{{$oferta->text}}</td>
              </tr>
                <tr>
              <td>Data de vigencia</td>
                <td>{{$oferta->vigenciadate}}</td>
              </tr>
              <tr>
              
                  <td>anuncio asociado</td>
                  <td>{{$oferta->anuncio_id}}</td>
              </tr>
               <tr>
              
                  <td>Propietario</td>
                  <td>{{$oferta->user_id}}</td>
              </tr>
               
             </table>
              <div class="text-end my-3">
                    <div class="btn-group mx-2">
                    
                       <a  href="{{route('oferta.show',$oferta->id)}}">
                         <img height="20" width="20" src="{{asset('img/buttons/show.png')}}"
                          alt="Ver detalles" title="Ver detalles">
                       </a>
                       
                        <a  href="{{route('oferta.edit',$oferta->id)}}">
                         <img height="20" width="20" src="{{asset('img/buttons/update.png')}}"
                          alt="Modificar" title="Modificar">
                       </a>
                       
                        <a  href="{{route('oferta.delete',$oferta->id)}}">
                         <img height="20" width="20" src="{{asset('img/buttons/delete.png')}}"
                          alt="Borrar" title="Borrar">
                       </a>
                   </div>
             </div>
      
         
</div>
 
   @endsection
  