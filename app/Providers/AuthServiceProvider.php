<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{

    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
    ];

    public function boot()
    {
        $this->registerPolicies();

        Gate::define('show-list', function ($user) {
            foreach ($user->roles as $role) {
                if ('Admin' == $role->name) {
                    return true;
                }
            }
            return false;
        });

        Gate::define('edit-task', function ($user, $task) {
                foreach ($user->roles as $role) {
                    if ('Admin' == $role->name) {
                        return true;
                    }
                }

                if ($user->id == $task->user_id) {
                    return true;
                }

            return false;
        });
    }
}
