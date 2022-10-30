@extends('layouts.master')
@section('log')
@section('titulo','Nuevo anuncio') 
@section('contenido')


  <div class="container">
          @forelse($anuncios as $anuncio)
              @if($anuncio->user_id != Auth::user()->id )
               <table class="table">
                 <tr>
                     <td>ID</td>
                    <td>titulo</td>
                    <td>Imagen</td>
                    <td>description</td>
                    <td>create oferta</td>
                 </tr>
                 <tr>
                   <td>{{$anuncio->id}}</td>
                   <td>{{$anuncio->titulo}}</td>
                   <td>
                    <img class="card-img-top" style="max-width:80%"
                     
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
                        
                        
                         <div id="accordion">
                              <div class="card">
                                <div class="card-header" id="headingOne">
                                  <h5 class="mb-0">
                                    <button class="btn btn-link" data-bs-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                      Crear oferta
                                    </button>
                                  </h5>
                                </div>
                            
                                <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                                  <div class="card-body">



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
