<!DOCTYPE html>
<html lang="es">
    <head>
         <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Aplicacion de gestion de motos larabikes"> 		
        <title>{{config('app.name')}} - @yield('titulo')</title> 
 
        <!-- Fonts -->
        <link href={{asset('css/bootstrap.min.css')}} rel="stylesheet">

        <!-- Styles -->
          
        <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
          <script src="{{ asset('js/bootstrap.min.js') }}" defer></script>
    </head>
    
    <body class="container p-3">
      
     
       
       @section('log')
           <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container ">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'cifopop') }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
               

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item mr-2">
                                <a  class="nav-link " href="{{route('home')}}" role="button"  aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} ( {{Auth::user()->email}} )
                                </a>
                            </li>
                            <li class="nav-item mr-2"> 
                                    <a class="nav-link" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                               
                             </li>
                        @endguest
                    </ul>
                </div>
            </div>
           </nav>
       
       @show
    
       @section('navegacion')
       @php($pagina=Route::currentRouteName()) 
       <nav>
        
            <ul class="nav nav-pills my-3">
                 <li>
                <a class="nav-link {{$pagina=='portada'? 'active' : ''}}" href="{{route('portada')}}">Inicio</a>
               </li>
             
            
                <li class="nav-item mr-2">
                   <a class="nav-link  {{$pagina=='anuncio.index' ? 'active' : ''}}" href="{{route('anuncio.index')}}">Anuncios</a>
                
                </li>
                 @auth
              
                <li class="nav-item mr-2">
                   <a class="nav-link {{$pagina=='home'? 'active' : ''}}" href="{{route('home')}}">Mis Anuncios</a>
                
                </li>
                <li class="nav-item mr-2">
                   <a class="nav-link {{$pagina=='anuncio.create'? 'active' : ''}}" href="{{route('anuncio.create')}}">Nuevo Anuncio</a>
                
                </li>
          
                 @endauth
            

                
            </ul>
        
        </nav>
      
        @show
        
<!--         <h1 class="my-2">Primer ejemplo de CRUD con laravel</h1> -->
        
        <main>
        
           <h2>@yield('titulo')</h2>
        
<!--             @includeWhen(Session::has('success'), 'layouts.success') -->
<!--             @includeWhen($errors->any(), 'layouts.error') -->

            @if(Session::has('success'))
               <x-alert type="success" message="{{ Session::get('success')}}"/>
            @endif
             @includeWhen($errors->any(),'layouts.error')


            
            @yield('contenido')
            
                   <div class="btn-group" role="group" aria-label="links">
                  @section('enlaces')
                  <a href="{{route('portada')}}" class="btn btn-primary m-2">Inicio</a>
               
                   @show
            
            
                  </div>
        </main>
        
        
        @section('pie')
         <footer class="page-footer font-small p-4 my-3 bg-light">
        
             <p>Aplication creada como ejemplo de clase.
             Desarrollada haciendo uso de <b>laravel </b> y <b>Bootstrap</b></p>
        </footer>
        
        @show
        
    </body>
 </html>       
        
             
        