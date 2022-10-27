@extends('layouts.master')
@section('log')
@section('navegacion')

@section('contenido')
         

         @if(!Auth::user()->hasVerifiedEmail())
        
              <div class="alert alert-danger">
               
        
                        @if (session('resent'))
                            
                                {{ __('A fresh verification link has been sent to your email address.') }}
                         
                        @endif
                        
                        
    
                        Antes de continuar, por favor confirme su correo electronico con el enlace de verificatión que le fue enviado.Si no ha recibido el correo electronico 
                        ,
                        <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                            @csrf
                            <button type="submit" class="btn btn-link p-0 m-0 align-baseline">Haga click aquí</button>.
                        </form>
          
              </div>
       @endif
   
 <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Mi perfil</div>

                <div class="card-body">
                <table class="table  table-borderless" >
                  <tr>
                     <th scope="row">Id :</th>
                     <td> {{Auth::user()->id}}</td>
                  </tr>
                   <tr>
                     <th scope="row">Nombre :</th>
                     <td> {{Auth::user()->name}}</td>
                  </tr>
                   <tr>
                     <th scope="row">Email :</th>
                     <td> {{Auth::user()->email}}</td>
                  </tr>
                   <tr>
                     <th scope="row">Nacimiento :</th>
                     <td> {{Auth::user()->nacimiento}}</td>
                  </tr>
                 <tr>
                     <th scope="row">Poblacion :</th>
                     <td> {{Auth::user()->poblacion}}</td>
                  </tr>
                   <tr>
                     <th scope="row">Codigo postal :</th>
                     <td> {{Auth::user()->cp}}</td>
                  </tr>
                </table>

                </div>
             </div>
        </div>
     </div>
  </div>
</div>



      <table class="table table-striped table-bordered my-5">
              <tr>
                <th>ID</th>
                <th>Image</th>
                <th>Titulo</th>
                <th>Descripcion</th>
              
              </tr>
            
              @forelse($anuncios as $anuncio)
              <tr>
                  <td>{{$anuncio->id}}</td>
                  <td class="text-center" style="max-width:80px">
                     <img class="rounded" style="max-width:80%"
                     
                     alt="Imagen de {{$anuncio->titulo}} "
                     titule="Image de {{$anuncio->titulo}}"
                     src="{{$anuncio->imagen? asset('storage/'.config('filesystems.bikesImageDir')).'/'.$anuncio->imagen:
                          asset('storage/'.config('filesystems.bikesImageDir')).'/default.png'}}">
                  
                  
                  
                  </td>
                
               
                  <td>{{$anuncio->titulo}}</td>
                <td>{{$anuncio->descripicion}}</td>
                    <td class="text-center">
                    
                       <a  href="{{route('anuncio.show',$anuncio->id)}}">
                         <img height="30" width="30" src="{{asset('img/buttons/show.png')}}"
                          alt="Ver detalles" title="Ver detalles">
                       </a>
                       @auth
                       @if(Auth::user()->can('update',$anuncio))
                        <a  href="{{route('anuncio.edit',$anuncio->id)}}">
                         <img height="30" width="30" src="{{asset('img/buttons/update.png')}}"></a>
                       @endif
                       
                       @if(Auth::user()->can('delete',$anuncio))
                        <a  href="{{route('anuncio.delete',$anuncio->id)}}">
                         <img height="30" width="30" src="{{asset('img/buttons/delete.png')}}"
                          alt="Borrar" title="Borrar">
                       </a>
                       @endif
                       @endauth
                    </td>
                    </tr>
                      @if($loop->last)
                        <tr>
                            <td colspan="7">
                              Mostrando{{sizeof($anuncios)}}
                               de {{$total}}
                             </td>
                        </tr>
                          
                 
                      @endif
                      
               @empty
                 <tr>
                    <td colspan="4">No hay resultados que mostrar</td>
                   
                 </tr>
                     
                 @endforelse
             
            </table>
            
        
               
               </table>
             

@endsection
