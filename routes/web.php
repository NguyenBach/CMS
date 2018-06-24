<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
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

    return view('Post::test');
});
