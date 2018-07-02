<?php
/**
 * Created by PhpStorm.
 * User: bachnguyen
 * Date: 25/06/2018
 * Time: 22:24
 */

Route::group([
    'prefix' => 'admin',
    'namespace' => 'App\Modules\Admin\Controllers'
],function (){
    Route::get('/','AdminController@index');
});