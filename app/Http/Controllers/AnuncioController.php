<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Anuncio;

class AnuncioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $anuncios = Anuncio::orderBy('id','DESC')->paginate(10);

        return view('anuncios.list',['anuncios'=>$anuncios]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('anucios.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $datos =$request->only(['titulo','descripcion','precio']);
        
        $datos +=['imagen'=> NULL];
        
        if($request->hasFile('imagen')){
            
            $ruta = $request->file('imagen')->store(config('filesystems.bikesImageDir'));
            
            $datos['imagen'] = pathinfo($ruta, PATHINFO_BASENAME);
            
        }
        
        
        $datos['user_id'] = $request->user()->id;
        
        $anuncio = Anuncio::create($datos);
        
//         if($request->user()->bikes->count() == 1)
//             FirstBikeCreated::dispatch($bike, $request->user());
            
            return redirect()
            ->route('anucios.show',$anuncio->id)
            ->with('success',"Anuncio $anuncio->titulo  se ha creado  satisfactoriamente")
            ->cookie('lastInsertId',$anuncio->id,0);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
