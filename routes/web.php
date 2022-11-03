<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AnuncioController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\ContactoController;
use App\Http\Controllers\OfertaController;
use App\Http\Controllers\AdminController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/',[WelcomeController::class,'index'])->name('portada');

Auth::routes(['verify'=>true]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('/anuncio', AnuncioController::class);

Route::get('anuncio/{anuncio}/delete',[AnuncioController::class, 'delete'])
                 ->name('anuncio.delete');

Route::match(['GET','POST'],'/anuncios/search',[AnuncioController::class,'search'])
          ->name('anuncio.search');

Route::resource('/oferta', OfertaController::class);

Route::get('/usuarios',[AdminController::class,'index'])->name('usuarios.index');
Route::put('/usuario/{$id}/edit',[AdminController::class,'edit'])->name('usuario.edit');
Route::get('/usuario/{$id}/edit',[AdminController::class,'delete'])->name('usuario.delete');

Route::get('oferta/{oferta}/delete',[OfertaController::class, 'delete'])
           ->name('oferta.delete');

           
Route::put('oferta/{oferta}/update2',[OfertaController::class, 'update2'])
           ->name('oferta.update2');







Route::post('/contacto',[ContactoController::class, 'send'])
            ->name('contacto.email');

Route::get('/contacto',[ContactoController::class, 'index'])
            ->name('contacto');

Route::prefix('admin')->middleware('auth','is_admin')->group(function(){
    
                 Route::get('deletedbikes',[AdminController::class,'deletedBikes'])
                       ->name('admin.deleted.bikes');
                 
                Route::get('/anuncio/{anuncio}/restore',[AdminController::class,'restore'])
                       ->name('anuncios.restore');
                
                Route::delete('/anuncios/purgue',[AdminController::class,'purgue'])
                       ->name('anuncios.purgue');
    
               
               Route::get('/usuarios/{user}/detalles',[AdminController::class,'userShow'])
                       ->name('admin.user.show');
               
               Route::get('/usuarios',[AdminController::class,'userList'])
                       ->name('admin.users');

               Route::get('/usuario/buscar',[AdminController::class,'userSearch'])
                       ->name('admin.users.search');


        }
            
            

    );


    
Route::get('/anuncios/{anuncio}/restore1',[AnuncioController::class,'restore'])
    ->name('anuncios.restore1');
    
Route::delete('/anuncio/purgue1',[AnuncioController::class,'purgue'])
    ->name('anuncios.purgue1');








