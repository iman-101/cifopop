<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Anuncio;

class AnuncioController extends Controller
{
    
    public function __construct(){
        $this->middleware('verified')->except('index','show', 'search');
        
      //  $this->middleware('password.confirm')->only('destroy');
    }
 
    public function index()
    {
        $anuncios = Anuncio::orderBy('id','DESC')->paginate(10);
        
        $total = Anuncio::count();
        
        return view('anuncios.list',['anuncios'=>$anuncios, 'total'=>$total]);
    }

   
    public function create()
    {
        return view('anuncios.create');
    }

    public function store(Request $request)
    {
       
        $datos =$request->only(['titulo','descripicion','precio']);
        
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
            ->route('anuncio.show',$anuncio->id)
            ->with('success',"Anuncio $anuncio->titulo  se ha creado  satisfactoriamente")
            ->cookie('lastInsertId',$anuncio->id,0);
    }

  
    public function show($id)
    {
        
        $anuncio = Anuncio::findOrFail($id);
        
        return view('anuncios.show',['anuncio'=>$anuncio]);
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
     
        $anuncio = Anuncio::findOrFail($id); 
        return view('anuncios.update',['anuncio'=>$anuncio]);
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
        
   
        
        $datos= $request->only('titulo','descripicion','precio');
        
        $anuncio = Anuncio::findOrFail($id);
        
        if($request->hasFile('imagen')){
            
            if($anuncio->imagen)
                $aBorrar = config('filesystems.bikesImageDir').'/'.$anuncio->imagen;
                
                
                $imagenNueva=$request->file('imagen')->store(config('filesystems.bikesImageDir'));
                
                $datos['imagen'] =pathinfo($imagenNueva, PATHINFO_BASENAME);
        }
        
        if($request->filled('eliminarimagen') && $anuncio->imagen){
            $datos['iamgen']=NULL;
            $aBorrar=config('filesystems.bikesImageDir').'/'.$anuncio->imagen;
        }
        
        //si todo va bien
        
        if($anuncio->update($datos)){
            if(isset($aBorrar))
                Storage::delete($aBorrar);
        }else{
            if(isset($imagenNueva))
                Storage::delete($imagenNueva);
        }
        $anuncio->update($request->all());
        
        return back()->with('success',"Anuncio  $anuncio->titulo actualizado");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
    public function delete(Request $request,Anuncio $anuncio){
        
       if($request->user()->cant('delete',$anuncio))
           abort(401, 'No puedes borrar un anuncio que no es tuya');
        return view('anuncios.delete',['anuncio'=>$anuncio]);
    }
    
    
    public function destroy($id)
    {
        if($request->user()->cant('delete',$anuncio))
            abort(401, 'No puedes borrar un anuncio que no es tuya');
        
            if($anuncio->delete() && $anuncio->imagen){
                             Storage::delete(config('filesystems.bikesImageDir').'/'.$anuncio->imagen);
                   }
        
        return redirect('anuncios')
                     ->with('success',"Anuncio  $anuncio->titulo eliminado");
    }
}
