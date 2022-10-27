<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Anuncio;

class WelcomeController extends Controller
{
    public function index()
    {
        
        $anuncios = Anuncio::orderBy('id','DESC')->paginate(10);
        
        return view('welcome',['anuncios'=>$anuncios]);
    }
}
