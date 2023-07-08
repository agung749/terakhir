<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Models\Staff;
class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
        Gate::define('admin', function($user) {
            return $user->role == 1  ;
         });
         Gate::define('spw', function($user) {
             return $user->role == 3;
         });
         Gate::define('bendahara', function($user) {
            $staff = Staff::where('email',$user->email)->get();
            return $user->role == 4 && $staff[0]->jabatan == "Bendahara" ;
        });
        //
    }
}
