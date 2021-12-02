<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Gate;
use App\Models\Permission;
use Illuminate\Support\Facades\Auth;



class PermissionsServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
        // try {
            
        //     Permission::get()->map(function ($permission) {
                
        //         $admin=  config()->get('fortify.guard');
        //         dd($permission->slug);
        //         Gate::define($permission->slug, function ($user) use ($permission,$admin) {
                  
        //             dd($admin);
        //             return $admin->hasPermissionTo($permission);
        //         });
        //     });
        // } catch (\Exception $e) {
        //     report($e);
        //     return false;
        // }
        

       
        Blade::directive('role', function ($role) {
            
            return "<?php if(auth()->check() && auth()->user()->hasRole({$role})) :?>";
             
        });
        Blade::directive('endrole', function ($role) {
            return "<?php endif; ?>"; //return this endif statement inside php tag
       });

        // Blade::directive('endrole', function ($role) {
            //  return "<?php } "; 
        // }); -->
        // dd(Blade::getCustomDirectives()); -->
    }
}
