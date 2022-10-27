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

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        //
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
       
        
        return $user->id == $anuncio->user_id || $user->hasRole('administrador');
    }


    public function restore(User $user, Anuncio $anuncio)
    {
        //
    }

   
    public function forceDelete(User $user,  Anuncio $anuncio)
    {
        //
    }
}
