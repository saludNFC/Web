<?php

namespace App\Providers;

use App\Permission;
use App\User;
use App\Patient;
use App\History;
use App\Control;
use App\Consultation;
use Illuminate\Contracts\Auth\Access\Gate as GateContract;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
        'App\User' => 'App\Policies\UserPolicy',
        'App\Patient' => 'App\Policies\PatientPolicy',
        'App\Contact' => 'App\Policies\ContactPolicy',
        'App\History' => 'App\Policies\HistoryPolicy',
        'App\Control' => 'App\Policies\ControlPolicy',
        'App\Consultation' => 'App\Policies\ConsultationPolicy',
    ];

    /**
     * Register any application authentication / authorization services.
     *
     * @param  \Illuminate\Contracts\Auth\Access\Gate  $gate
     * @return void
     */
    public function boot(GateContract $gate)
    {
        $this->registerPolicies($gate);

        $gate->define('create_user', function($user){
            return $user->hasRole('root') || $user->hasRole('admin');
        });

        $gate->define('create_patient', function($user){
            return $user->hasRole('root') || $user->hasRole('admin');
        });

        $gate->define('create_contact', function($user){
            return $user->hasRole('root') || $user->hasRole('admin');
        });

        $gate->define('create_history', function($user){
            return $user->hasRole('root') || $user->hasRole('admin') || $user->hasRole('doctor') || $user->hasRole('nurse');
        });

        $gate->define('create_control', function($user){
            return $user->hasRole('root') || $user->hasRole('doctor') || $user->hasRole('nurse');
        });

        $gate->define('create_consultation', function($user){
            return $user->hasRole('root') || $user->hasRole('doctor');
        });
    }
}
