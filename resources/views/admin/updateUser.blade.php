@extends('layouts.master')
@section('log')


@section('contenido')
  <div class="container">
       <form class="my-2 border p-5" method="POST" action="{{route('usuario.update',$usuario->id)}}" enctype="multipart/form-data">
              
                 {{csrf_field()}}
                 <input type="hidden" name="_method" value="PUT">
                 <input type="hidden" name="id" value="{{$usuario->id}}">
                 <div class="form-group row">
                      <label for="inputMarca" class="col-sm-2 col-form-label">Rol</label>
                 
                       <input name="role_id" type="text" class="up form-control col-sm-10" 
                        id="inputMarca" placeholder="Marca" maxlength="255" value="{{$usuario->role_id}}" >
                 </div>
             
            
                 
                 
                 <div class="form-group row">
                     
                      <button type="submit" class="btn btn-success m-2 mt-5">Actualizar</button>
                      <button type="reset" class="btn btn-secondary m-2 ">Restablecer</button>
                 </div>
              </form>
    </div>
@endsection