<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Produto;
Use App\Image;
Use Storage;
class HomeController extends Controller
{
    public function lista(){
        $lista_prod = Produto::all();
        $lista_img = Image::all();

        $array = array('lista' => $lista_prod, 'images' => $lista_img);

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
                $file = $req->file('imgP');

                if(!empty($file)){
                    // Identificando formato da imagem
                    $OriginalName = $file->getClientOriginalName();
                    $formato_img = substr($OriginalName, -4);

                    // Criando nome unico para arquivo
                    $nome_arquivo = $req->input('id') . date("Y-m-d H:i:s");
                    $nome_arquivo = hash("md5", date("Y-m-d H:i:s")) . $formato_img;

                    // Salvando na pasta App/Image/
                    Storage::put('/image/'.$nome_arquivo, file_get_contents($file));

                    // Adicionar a tabela de imagens
                    $add_img = new Image;
                    $add_img->id_user = $req->id;
                    $add_img->nome_arquivo = $nome_arquivo;
                    $add_img->save();

                    // Relacionando o id gerado na tabela de produtos
                    $id_img = $add_img->where('nome_arquivo', $nome_arquivo)->get();
                    $item->img = $id_img[0]->id_img;
                }
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
