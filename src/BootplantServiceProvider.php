<?php
namespace Futurelabs\bootplant;

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class BootplantServiceProvider extends ServiceProvider
{
    public function boot()
    {
        Schema::defaultStringLength(191);
        $this->publishes([
            __DIR__ . '/config/bootplant.php' => config_path('bootplant.php'),
        ], 'config');

        $this->loadRoutesFrom(__DIR__ . '/routes/web.php');

        // $this->app['router']->group(['namespace' => 'Futurelabs\Bootplant\Http\Controllers'], function () {
        //     require __DIR__ . '/routes/web.php';
        // });

        $this->loadMigrationsFrom(__DIR__ . '/database/migrations');

        // $this->publishes([
        //     __DIR__ . '/resources/views' => base_path('resources/views/vendor/bootplant'),
        // ], 'views');

        $this->loadViewsFrom(__DIR__ . '/resources/views', 'bootplant');

        $this->publishes([
            __DIR__ . '/resources/assets/images'   => public_path('bootplant/images'),
            __DIR__ . '/resources/assets/fonts'    => public_path('bootplant/fonts'),
            __DIR__ . '/resources/assets/webfonts' => public_path('bootplant/webfonts'),
            __DIR__ . '/public/bootplant'          => public_path('bootplant'),
            __DIR__ . '/resources/assets/css'      => public_path('bootplant/css'),
            __DIR__ . '/resources/assets/publicjs' => public_path('bootplant/js'),
        ]);

        $router = $this->app['router'];
        $router->pushMiddlewareToGroup('role', \Spatie\Permission\Middlewares\RoleMiddleware::class);
        $router->pushMiddlewareToGroup('permission', \Spatie\Permission\Middlewares\PermissionMiddleware::class);
        $router->pushMiddlewareToGroup('role_or_permission', \Spatie\Permission\Middlewares\RoleOrPermissionMiddleware::class);
        if ($this->app->runningInConsole()) {
            $this->registerSeedsFrom([
                'RolesAndPermissionsSeeder',
                'BranchTableSeeder',
                'UserTableSeeder',
                'MetaGroupTableSeeder',
                'MetaDefaultTableSeeder',
            ]);
        }

        $this->registerHelpers();
        $this->registerBladeComponents();
    }

    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . '/config/bootplant.php', 'bootplant');
    }

    protected function registerSeedsFrom($seeders)
    {
        foreach ($seeders as $seeder) {
            include __DIR__ . '/database/seeds/' . $seeder . '.php';
            $classes = get_declared_classes();
            $class   = end($classes);

            $command = Request::server('argv', null);
            if (is_array($command)) {
                $command = implode(' ', $command);
                if ($command == "artisan db:seed") {
                    Artisan::call('db:seed', ['--class' => $class]);
                }
            }
        }
    }

    /**
     * Register helpers file
     */
    public function registerHelpers()
    {
        // Load the helpers in Helpers/helpers.php
        require_once __DIR__ . '/Helpers/helpers.php';
    }

    /**
     * Carica i Componenti grafici Blade (resources/views/components)
     */
    protected function registerBladeComponents()
    {
        //Restrizione sul tipo di posizione menu
        if (config('bootplant.app_menu_position') != 'top' && config('bootplant.app_menu_position') != 'left') {
            throw new \Exception("Config chiave 'app_menu_position': le uniche posizioni consentite per il menu sono 'left' e 'top' attualmente impostato su '" . config('bootplant.app_menu_position') . "'", 1);
        }

        //Dashboard cards
        Blade::component('bootplant::components.card', 'card');
        //Menu
        Blade::component('bootplant::components.sidebar.item', 'item');
        Blade::component('bootplant::components.sidebar.block-' . config('bootplant.app_menu_position'), 'block');
        Blade::component('bootplant::components.sidebar.dropdown-' . config('bootplant.app_menu_position'), 'dropdown');
        Blade::component('bootplant::components.sidebar.dropdown-item', 'dropdownitem');

        //Pannello azioni
        Blade::component('bootplant::components.registry-actions', 'registryactions');

        //Tabs
        Blade::component('bootplant::components.tabs.tab-block', 'tabs');
        Blade::component('bootplant::components.tabs.tab', 'tab');
        Blade::component('bootplant::components.tabs.tab-content', 'tabcontent');

        //Table
        Blade::component('bootplant::components.table.table', 'table');
    }
}
