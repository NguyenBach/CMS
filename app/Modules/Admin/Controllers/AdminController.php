<?php
/**
 * Created by PhpStorm.
 * User: bachnguyen
 * Date: 25/06/2018
 * Time: 22:26
 */

namespace App\Modules\Admin\Controllers;


use App\Modules\Core\Controllers\CoreController;

class AdminController extends CoreController
{
    public function index(){
        return view('Admin::dashboard');
    }
}