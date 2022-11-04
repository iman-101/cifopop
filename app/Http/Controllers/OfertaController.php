<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Oferta;
use App\Models\Anuncio;
use App\Http\Requests\OfertaRequest;

class OfertaController extends Controller
{
    public function __construct(){
        $this->middleware('verified')->except('index','show', 'search');
      
    }
    public function index(Request $request)
    {
      //  $ofertas = Oferta::orderBy('id','DESC')->paginate(10);
        
        $ofertas = $request->user()->ofertas()->get();
        
        $ofertasT =   Oferta::orderBy('id','DESC')->paginate(10);
     
        return view('ofertas.list',['ofertas'=>$ofertas,'ofertasT'=>$ofertasT]);
    }

    
    public function create(Request $request,Oferta $oferta)
    {
        if($request->user()->can('create',$oferta))
            abort(401, 'No puedes crear una oferta. estas bloqueado ');
        
        $anuncios1 = Anuncio::orderBy('id','DESC')->paginate(10);
        $anuncios = [];
        
        
        foreach($anuncios1 as $anuncio){
                
            if(! $anuncio->ofertaAcceptada()){
                $anuncios[] =$anuncio;
            }
        
        }
          
        
        return   view('ofertas.create',['anuncios'=>$anuncios]);
    }


    public function store(OfertaRequest $request)
    {
        
//         $oferatss = $datos['anuncio_id']->ofertas()->get();
//         foreach ($oferatss as $o){
//             if($o->acceptada != null){
//                 return back()->with('error',"Oferta $oferta->text  se ha creado  satisfactoriamente");
//             }
//         }
     
        $datos =$request->only(['text','acceptada','import','rechazada','vigenciadate','anuncio_id']);
        

        
      
        $datos['user_id'] = $request->user()->id;
        $datos['anuncio_id'] = $request->anuncio_id;
        
        
        $oferta= Oferta::create($datos);
        
//        if($request->user()->bikes->count() == 1)
//                 FirstBikeCreated::dispatch($bike, $request->user());
                
        return redirect()
        ->route('oferta.create',$oferta->id)
        ->with('success',"Oferta $oferta->text  se ha creado  satisfactoriamente")
        ->cookie('lastInsertId',$oferta->id,0);
    }
    

    public function show($id)
    {
        
        $oferta = Oferta::findOrFail($id);
        
        return view('ofertas.show',['oferta'=>$oferta]);
        
    }

    public function edit(Request $request,$id)
    {
      
        
        $oferta = Oferta::findOrFail($id);
        
        if($request->user()->cant('update',$oferta))
            abort(401, 'No tienes permiso para esta operación. ');
        
        if($oferta->acceptada ){
            abort(401, 'No puedes editar esta oferta : ya esta acceptada. ');
        }
        
        if($oferta->rechazada ){
            abort(401, 'No puedes editar esta oferta : ya esta rechazada. ');
        }
        
        return view('ofertas.update',['oferta'=>$oferta]);
    }
    
    public function update(Request $request, $id)
    {
        
        $datos = $request->only('text','acceptada','import','rechazada','vigenciadate');
         
        $oferta = Oferta::findOrFail($id);
        
        if($request->user()->cant('update',$oferta))
            abort(401, 'No tienes permiso para esta operación. ');
        
        $oferta->update($datos);
        
        return back()->with('success',"Oferta $oferta->id actualizada");
    }
    
    public function update2(Request $request, $id)
    {
        
        $datos= $request->only('acceptada','rechazada');
        
        $oferta = Oferta::findOrFail($id);
        
        if($request->acceptada != null){
            
            $anunciosid = $oferta->anuncio_id;
            
            $anuncio = Anuncio::findOrFail($anunciosid);
            
            $ofertas = $anuncio->ofertas()->get();
            
            foreach($ofertas as $oferta){
                
                $oferta->rechazada = $request->acceptada;
                if($oferta->id == $id){
                   
                    $oferta->acceptada = $request->acceptada;
                }
                
                $oferta->update([$oferta]);
                
            }
            
            return back()->with('success',"Anuncio  $oferta->text actualizada");
            
        }
        
        $oferta->update($request->all());
        
        return back()->with('success',"Anuncio  $oferta->text actualizada");
    }
   
    public function delete(OfertaRequest $request,Oferta $oferta){
        
        if($request->acceptada){
            abort(404, 'No puedes borrar esta oferta Ya esta acceptada.');
        }
        if($request->user()->cant('delete',$oferta))
            abort(401, 'No puedes borrar una oferta que no es tuya');
        
       
        return view('oferta.delete',['oferta'=>$oferta]);
    }
    
    
    public function destroy(OfertaRequest $request,Oferta $oferta)
    {
        $oferta->delete();
        
        return redirect()
        ->route('home')
        ->with('success',"Oferta  $oferta->text eliminada");
    }
}
