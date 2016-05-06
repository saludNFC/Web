<?php

namespace App\Providers;

use App\Permission;
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
        'App\Patient' => 'App\Policies\PatientPolicy',
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

        // foreach($this->getPermissions() as $permission){
        //     $gate->define($permission->name, function($user) use ($permission){
        //         return $user->hasRole($permission->roles);
        //     });
        // }
    }

    protected function getPermissions(){
        return Permission::with('roles')->get();
    }
}
