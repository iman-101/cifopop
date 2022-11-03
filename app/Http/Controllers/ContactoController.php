<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\Contact;

class ContactoController extends Controller
{
    
    public function index() {
        
        return view('contacto');
    }
    
    
    public function send(Request $request){
        $mensaje = new \stdClass();
        $mensaje->asunto = $request->asunto;
        $mensaje->email = $request->email;
        $mensaje->nombre = $request->nombre;
        $mensaje->mensaje = $request->mensaje;
        
        Mail::to('Contacto@larabikes.com')->send(new Contact($mensaje));
        
        return redirect()
        ->route('portada')
        ->with('success','Mensaje enviado correctamente');
    }
}