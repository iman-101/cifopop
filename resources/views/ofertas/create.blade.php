@extends('layouts.master')
@section('log')
@section('titulo','Nuevo anuncio') 
@section('contenido')


  <div class="container">
          <table class="table">
                 <tr>
                     <td>ID</td>
                    <td>titulo</td>
                    <td>Imagen</td>
                    <td>description</td>
                    <td></td>
                 </tr>
          @forelse($anuncios as $anuncio)
              @if($anuncio->user_id != Auth::user()->id )
           
                 <tr>
                   <td>{{$anuncio->id}}</td>
                   <td>{{$anuncio->titulo}}</td>
                   <td>
                    <img class="card-img-top" width="50" height="80"
                     
                     alt="Imagen de {{$anuncio->titulo}}"
                     titule="Image de {{$anuncio->titulo}}"
                     src="{{$anuncio->imagen? asset('storage/'.config('filesystems.bikesImageDir')).'/'.$anuncio->imagen:
                          asset('storage/'.config('filesystems.bikesImageDir')).'/default.png'}}">
                    </td>
                   
                    <td>{{$anuncio->descripicion}}</td>
                    <td>
                        <a href="{{route('anuncio.show',$anuncio->id)}}" 
                         class=""><img height="30" width="30" src="{{asset('img/buttons/show.png')}}"
                          alt="Ver detalles" title="Ver detalles"> </a>
                        
                      
                    </td>
                    
                 </tr>
                  <tr>
                      <td colspan="4">
                          <p>
                              <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                                Crear oferta
                              </button>
                                                     
                        </p>
                        <div class="collapse" id="collapseExample">
                          <div class="card card-body">
                          
                                      <form class="my-2 border p-5" method="POST" action="{{route('oferta.store')}}" >
                                      
                                         {{csrf_field()}}
                                         
                                       
                                         <input type="hidden" name="anuncio_id" value="{{$anuncio->id}}">
                                         <div class="form-group row">
                                              <label for="inputDescripcion" class="col-sm-2 col-form-label">Texto</label>
                          
                                                <textarea name="text">...</textarea>
                                         </div>
                                         
                                            <div class="form-group row">
                                              <label for="inputPrecio" class="col-sm-2 col-form-label">Importe</label>
                                              
                                                <input name="import" type="number" class="up form-control col-sm-10" 
                                                id="inputimport" placeholder="import" maxlength="255" value="{{old('import')}}"  required>
                                         </div>
                                         
                                           <div class="form-group row">
                                              <label for="inputvigenciadate" class="col-sm-2 col-form-label">Data de vigencia</label>
                                         
                                                <input name="vigenciadate" type="date" class="up form-control col-sm-10" 
                                                id="inputvigenciadate"  value="{{old('vigenciadate')}}" >
                                         </div>
                                      
                                       
                                           
                                          </div>
                        
                                          
                                         <div class="form-group row">
                                             
                                              <button type="submit" class="btn btn-success m-2 mt-5">Guardar</button>
                                              <button type="reset" class="btn btn-secondary m-2 ">Borrar</button>
                                         </div>
                                      </form>
                          </div>
                        </div>
                      
                      
                      </td>
                  
                  
                  
                  </tr>
               </div>
                  
                  
               </table>
              
                  @endif       
               @empty
                
                    <h2>No hay resultados que mostrar</h2>
                   
                 @endforelse
         
             
     </div>       
@endsection





                               
