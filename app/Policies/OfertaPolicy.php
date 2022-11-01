<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Oferta;
use Illuminate\Auth\Access\HandlesAuthorization;

class OfertaPolicy
{
    use HandlesAuthorization;

   
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\odel=Oferta  $odel=Oferta
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Oferta $oferta)
    {
        
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user, Oferta $oferta)
    {
        return  $user->hasRole('bloqueador');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\odel=Oferta  $odel=Oferta
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Oferta $oferta)
    {
        return $user->id == $oferta->user_id ||  $user->hasRole('administrador')
              ||  $user->hasRole('editor');
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\odel=Oferta  $odel=Oferta
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Oferta $oferta)
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\odel=Oferta  $odel=Oferta
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Oferta $oferta)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\odel=Oferta  $odel=Oferta
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user,Oferta $oferta)
    {
        //
    }
}
