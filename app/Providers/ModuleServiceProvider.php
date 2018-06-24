<?php
/**
 * Created by PhpStorm.
 * User: bachnguyen
 * Date: 24/06/2018
 * Time: 23:07
 */

namespace App\Providers;


use Illuminate\Support\ServiceProvider;

class ModuleServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $modules = [];
        $module_dir = config('app.module_dir');
        if (file_exists($module_dir)) {
            $dirs = scandir($module_dir);
            if ($dirs) {
                foreach ($dirs as $dir) {
                    $dir = $module_dir.'/'.$dir;
                    $files = scandir($dir);
                    if (in_array('config.xml', $files)) {
                        $xml = simplexml_load_file($dir . '/config.xml');
                        if ($xml->active) {
                            $modules[] = $xml;
                        }
                    }
                }
            }
        }
        foreach ($modules as $module) {
            if (file_exists($module_dir.'/' . $module->module . '/routes.php')) {
                include $module_dir.'/' . $module->module . '/routes.php';
            }
            if (is_dir($module_dir.'/' . $module->module . '/Views')) {
                $this->loadViewsFrom($module_dir.'/' . $module->module . '/Views', (string)$module->module);
            }
            if (is_dir($module_dir.'/' . $module->module . '/Migrations')) {
                $this->loadMigrationsFrom($module_dir.'/' . $module->module . '/Migrations');
            }
        }
    }

    public function register()
    {
    }
}