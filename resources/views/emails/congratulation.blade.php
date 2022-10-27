<!DOCTYPE html>
<html lang="es">
    <head>
         <meta charset="UTF-8">
        <style>
        
          
          @php
            include 'css/bootstrap.min.css';
          @endphp
        </style>
  
    </head>
    <body class="container p-3">
        <header class="container bg-fluid p-4 my-2">
           <figure class="img-fluid m-2">
              <img src="{{asset('img/logos/logo.png')}}" alt="logo" width="50" height="50">
           </figure>
        
        <h1 class="col-10">{{config('app.name')}} </h1>
        </header>
        <main>
        <h1>Felicidades</h1>
           <h2>¡Has publicado tu primera moto en laravel !</h2>
           <p class="cursiva">Tu nueva moto {{$bike->marca.' '.$bike->modelo}}
             ya aparece en los resultados.</p>
           <p>Sigue así, estas colaborando para que Larabiikes se convierta en la primero red
           de usuarios de motocicleta de los CIFO</p>
        </main> 
         <footer class="page-footer font-small p-4 bg-light">
            <p>Aplication creada por como ejemplo de clase.
            Desarrollada haciendo uso de <b>Larabel</b> y <b>Bootstrap</b>
            </p>
         
         
         </footer>
    
    
    
    </body>
 </html>