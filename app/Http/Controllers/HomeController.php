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

    public function add(Request $req){
        if($req->has('nome')){
            $nome = $req->input('nome');
            $desc = $req->input('descricao');
            $valor = $req->input('valor');

            $add_prod = new Produto;
            $add_prod->nome = $nome;
            $add_prod->descricao = $desc;
            $add_prod->valor = $valor;
            // só pra testar sem erros
            $add_prod->img = "false";
            $add_prod->save();
        }
        return redirect('/');
    }

    public function update(Request $req){
        if($req->has('id')){
            $item = Produto::find($req->input('id'));
            if($item){
                $item->nome = $req->input('nome');
                $item->descricao = $req->input('descricao');
                $item->valor = $req->input('valor');
                $item->img = "att";
                $item->save();
            }
        }
        return redirect('/');
    }

    public function delete($id){
        Produto::find($id)->delete();

        return redirect('/');
    }
}
