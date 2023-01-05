<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index(){
        $viewName = config("app.name");
        dd($viewName); //->return the value of it
        return view($viewName);
    }
}
