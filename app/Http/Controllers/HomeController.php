<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Produto;

class HomeController extends Controller
{
    public function lista(){
        $lista_prod = Produto::all();

        $array = array('lista' => $lista_prod);
        return view('lista', $array);
    }
}
