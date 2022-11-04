<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Notifications\Messages\MailMessage;

class AuthServiceProvider extends ServiceProvider
{
   
    protected $policies = [
        'App\Models\Anuncio' => 'App\Policies\AnuncioPolicy',
    ];

   
    public function boot()
    {
        $this->registerPolicies();

        VerifyEmail::toMailUsing(function ($notifiable,$url){
            // traducira email de validacion
            return (new MailMessage)
            ->subject('Verificar email')
            ->greeting('Hola')
            ->salutation('Un saludo')
            ->line('Haz clic en la siguiente línea para verificar tu email.')
            ->action('Verificar email', $url);
        });
    }
}
