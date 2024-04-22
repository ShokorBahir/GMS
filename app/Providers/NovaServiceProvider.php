<?php

namespace App\Providers;

use App\Nova\Dashboards\Main;
use App\Nova\Department;
use App\Nova\Faculty;
use App\Nova\StudentFile;
use App\Nova\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Gate;
use Laravel\Nova\Menu\MenuItem;
use Laravel\Nova\Menu\MenuSection;
use Laravel\Nova\Nova;
use Laravel\Nova\NovaApplicationServiceProvider;

class NovaServiceProvider extends NovaApplicationServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();
        Nova::enableRTL();

        Nova::footer(function ($request) {
            $year = now()->year;
            return Blade::render("
            <h1 style='text-align: left;'>
            Developed by SSR @$year </h1>
            ");

        });
        Nova::mainMenu(function (Request $request) {
            return [
                MenuSection::dashboard(Main::class),
                MenuSection::make(trans("University"),[
                    MenuItem::resource(new Faculty),
                    MenuItem::resource(new Department),
                    MenuItem::resource(new StudentFile),
                ]),

                MenuSection::make(__('Administration'), [
                    MenuItem::resource(\App\Nova\User::class),
                    MenuItem::resource(\Sereny\NovaPermissions\Nova\Role::class),
                    MenuItem::resource(\Sereny\NovaPermissions\Nova\Permission::class),
                ])->icon('user')->collapsable()->collapsedByDefault(),

            ];
        });
    }

    /**
     * Register the Nova routes.
     *
     * @return void
     */
    protected function routes()
    {
        Nova::routes()
            ->withAuthenticationRoutes()
            ->withPasswordResetRoutes()
            ->register();
    }

    /**
     * Register the Nova gate.
     *
     * This gate determines who can access Nova in non-local environments.
     *
     * @return void
     */
    protected function gate()
    {
        Gate::define('viewNova', function ($user) {
            return in_array($user->email, [
                //
            ]);
        });
    }

    /**
     * Get the dashboards that should be listed in the Nova sidebar.
     *
     * @return array
     */
    protected function dashboards()
    {
        return [
            new \App\Nova\Dashboards\Main,
        ];
    }

    /**
     * Get the tools that should be listed in the Nova sidebar.
     *
     * @return array
     */
    public function tools()
    {
        return [
            // new \Sereny\NovaPermissions\NovaPermissions(),
            new \Sereny\NovaPermissions\NovaPermissions(),


        ];
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
