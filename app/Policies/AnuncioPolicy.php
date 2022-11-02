<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Anuncio;
use Illuminate\Auth\Access\HandlesAuthorization;

class AnuncioPolicy
{
    use HandlesAuthorization;

        public function view(User $user, Bike $bike)
    {
        //
    }

  
    public function create(User $user, Anuncio $anuncio)
    {
        return  $user->hasRole('bloqueador');             
    }


    public function update(User $user, Anuncio $anuncio)
    {
//         return $user->id == $bike->user_id || $user->email == 'admin@larabike.com';

        return $user->id == $anuncio->user_id ||  $user->hasRole('administrador')
            ||  $user->hasRole('editor');
    }

    public function delete(User $user, Anuncio $anuncio)
    {
       // return $user->id == $bike->user_id || $user->email == 'admin@larabike.com';
       
        
        return $user->id == $anuncio->user_id || $user->hasRole('administrador') ||
                 $user->hasRole('editor');
    }


    public function restore(User $user, Anuncio $anuncio)
    {
        return $user->id == $anuncio->user_id ;
    }

   
    public function forceDelete(User $user,  Anuncio $anuncio)
    {
        return $user->hasRole('administrador') || $user->id == $anuncio->user_id;
    }
}
