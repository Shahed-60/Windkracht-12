<?php

namespace App\Providers;

use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Notifications\Messages\MailMessage;
// use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        //
    ];
    // 

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        VerifyEmail::toMailUsing(function (object $notifiable, string $url) {
            return (new MailMessage)
                ->greeting('Hallo ' . $notifiable->name . ',')
                ->from('KitesurfSchool@gmail.com')
                ->subject('Verifieer uw e-mailadres')
                ->line('Klik op de knop hieronder om uw e-mailadres te verifiëren.')
                ->action('Verifieer e-mailadres', $url)
                ->line('Als u geen account heeft aangemaakt, is geen verdere actie vereist.')
                ->salutation('Met vriendelijke groet, Kitesurf School');
        });
    }
}
