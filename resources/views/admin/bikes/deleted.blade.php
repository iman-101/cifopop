@extends('layouts.master')
@section('log')
@section('titulo','Anuncios borrados')


@section('log')


@section('contenido')
<div class="container">

    <h3 class="mt-4">Motos borradas</h3>

    <div class="text-start">
    
       <table class="table">
           <tr>
              <th>ID</th>
              <th>Imagen</th>
              <th>Titulo</th>
              <th>Descripcion</th>
              <th>Precio</th>
          </tr>
          @forelse($anuncios as $anuncio)
          <tr>
             <td><b>#{{$anuncio->id}}</b></td>
            <td class="text-center" style="max-width: 80px">
             <img class="rounded" style="max-width:400px"
                    
                    alt="Imagen de {{$anuncio->titulo}} "
                    title="Imagen de {{$anuncio->titulo}} "
                    src="{{$anuncio->imagen? 
                     asset('storage/'.config('filesystems.bikesImageDir')).'/'.$anuncio->imagen:
                        asset('storage/'.config('filesystems.bikesImageDir')).'/default.png'}}">
                 
                
            </td>
            <td>{{$anuncio->titulo}}</td>
            <td>{{$anuncio->descripicion}}</td>
            <td>{{$anuncio->precio}}</td>
            <td class="text-center"> 
                <a href="{{route('anuncios.restore', $anuncio->id)}}">
                 <button class="btn btn-success">Restaurar</button>
            
               </a>
            </td>
            
            <td class="text-center">
                <a onclick='if(confirm("Estas seguro?"))
                          this.nextElementSibling.submit()'>
                 <button class="btn btn-danger">Eliminar</button>
                       
                 </a>
                 
                 <form method="POST"class="d-done" action="{{route('anuncios.purgue')}}">
                   @csrf
                   <input name="_method" type="hidden" value="DELETE">
                 
                    <input name="anuncio_id" type="hidden" value="{{$anuncio->id}}">
                 </form>
            
            </td>
          </tr>
          
          @empty
             <tr>
                <td colspan="8">No hay anuncios borrados</td>
         @endforelse
       </table>
    
    </div>
           
</div>

@endsection