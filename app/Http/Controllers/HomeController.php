<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Anuncio;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        
        $anuncios = Anuncio::orderBy('id','DESC')->paginate(10);
        $deletedAnuncios = $request->user()->anuncios()->onlyTrashed()->get();
        
        $total = Anuncio::count();
        
        return view('home',['anuncios'=>$anuncios, 'total'=>$total,'deletedAnuncios'=>$deletedAnuncios]);
    }
}
