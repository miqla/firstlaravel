<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use App\Models\User;
use Illuminate\Support\Facades\Gate;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrap();

        // definisikan sebuah gate bernama admin, yg cuma bisa diakses oleh user, yg username nya mila
        Gate::define('admin', function(User $user){
            // return $user->username === 'mila';
            // setelah kita buat field baru di table, is_admin
            return $user->is_admin;
        });
    }
}
