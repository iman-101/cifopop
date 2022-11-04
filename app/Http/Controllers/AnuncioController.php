<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Anuncio;
use App\Http\Requests\AnuncioRequest;

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

   
    public function create(Request $request,Anuncio $anuncio)
    {
        if($request->user()->can('create',$anuncio))
            abort(401, 'No puedes crear un anuncio ');
        
        return view('anuncios.create');
    }

    public function store(AnuncioRequest $request)
    {
       
        $datos =$request->only(['titulo','descripicion','precio']);
        
        $datos +=['imagen'=> NULL];
        
        if($request->hasFile('imagen')){
            
            $ruta = $request->file('imagen')->store(config('filesystems.bikesImageDir'));
            echo $ruta;
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
        $usuario = $anuncio->user()->get()->get(0);
        $ofertas = $anuncio->ofertas()->get();
        
        
        return view('anuncios.show',['anuncio'=>$anuncio, 'ofertas'=>$ofertas,'usuario'=>$usuario]);
        
    }

    
    public function edit(Request $request,$id)
    {
     
        $anuncio = Anuncio::findOrFail($id); 
        
        if($request->user()->cant('update',$anuncio))
            abort(401, 'No puedes actualizar un anuncio ');
        
        return view('anuncios.update',['anuncio'=>$anuncio]);
    }

    public function update(AnuncioRequest $request, $id)
    {
       
        $datos= $request->only('titulo','descripicion','precio');
        
        $anuncio = Anuncio::findOrFail($id);
        
        if($request->user()->cant('update',$anuncio))
            abort(401, 'No puedes actualizar un anuncio ');
       
        
        if($request->hasFile('imagen')){
            
            if($anuncio->imagen)
                $aBorrar = config('filesystems.bikesImageDir').'/'.$anuncio->imagen;
                
                
                $imagenNueva=$request->file('imagen')->store(config('filesystems.bikesImageDir'));
                
                $datos['imagen'] =pathinfo($imagenNueva, PATHINFO_BASENAME);
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

  
    
    public function delete(Request $request,Anuncio $anuncio){
        
       if($request->user()->cant('delete',$anuncio))
           abort(401, 'No puedes borrar un anuncio que no es tuya');
        return view('anuncios.delete',['anuncio'=>$anuncio]);
    }
    
    
    public function destroy(Request $request,Anuncio $anuncio)
    {
        
        if($request->user()->cant('delete',$anuncio))
            abort(401, 'No puedes borrar un anuncio que no es tuya');
         $anuncio->delete();
        
        return redirect()
                     ->route('home')
                     ->with('success',"Anuncio  $anuncio->titulo eliminado");
    }
    
    public function search(Request $request){
        
        $request->validate([
            
            'titulo'=>'max:16',
            'descripicion'=>'max:255',
            
        ]);
        
        $titulo=$request->input('titulo','');
        $descripicion=$request->input('descripicion','');
        
        $anuncios= Anuncio::where('titulo','like',"%$titulo%")
                            ->where('descripicion','like',"%$descripicion")
                            ->paginate(config('paginator.anuncios'))
                            ->appends(['titulo'=>$titulo,'descripicion'=>$descripicion]);
        
                            return view('anuncios.list',['anuncios'=>$anuncios,'titulo'=>$titulo,'descripicion'=>$descripicion]);
    }
    
    
    public function restore(Request $request,int $id){
        
     
        
        $anuncio = Anuncio::withTrashed()->find($id);
        if($request->user()->cant('delete',$anuncio))
            abort(401, 'No puedes borrar un anuncio que no es tuya');
        $anuncio->restore();
        
        return back()->with(
            'success', "Anuncio $anuncio->titulo restaurado correctamente.");
    }
    
    public function purgue(Request $request){
        
      
     
        $anuncio = Anuncio::withTrashed()->find($request->input('anuncio_id'));
        
        if($request->user()->cant('delete',$anuncio))
            abort(401, 'No puedes borrar un anuncio que no es tuya');
        
        $ofertas = $anuncio->ofertas()->get();
    
        foreach($ofertas as $oferta){
            $oferta->delete();
        }
        
      
        
        if($anuncio->forceDelete() && $anuncio->imagen){
            Storage::delete(config('filesystems.bikesImagenDir').'/'.$anuncio->imagen);
            
        }
        
        return back()->with('success',"Moto $anuncio->titulo eliminada definitivamente.");

      
    }
    
    
    
    
}
