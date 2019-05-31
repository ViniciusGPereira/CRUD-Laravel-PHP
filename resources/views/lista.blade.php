<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/app.css">
    <script src="js/app.js"></script>
    <title>Produtos</title>
</head>
<body>
    <div class="container">
        <div class="topo">
            <div class="topo_text">
                <h1>Lista de Produtos</h1>
            </div>
            <div class="topo_add">
                <a href="" data-toggle="modal" data-target="#addModal" >+</a>
            </div>
        </div>
        <div class="conteudo">
            <table class="table table-hover">
                @if(count($lista) > 0)
                    <thead>
                        <tr>
                            <th>Foto</th>
                            <th>Título</th>
                            <th>Descrição</th>
                            <th>Valor</th>
                            <th>Opções</th>
                        </tr>
                    </thead>
                    @foreach($lista as $item)
                    <tbody>
                        <tr>
                            <td scope="row">
                                @foreach($images as $imagem)
                                    @if($item->id == $imagem->id_user)
                                        <li>{{$imagem->nome_arquivo}}</li>
                                    @endif
                                @endforeach
                            </td>
                            <td>{{$item->nome}}</td>
                            <td>{{$item->descricao}}</td>
                            <td>{{$item->valor}}</td>
                            <td><a href="" data-toggle="modal" data-target="#attModal{{$item->id}}">Edit</a> - <a href="del/{{$item->id}}">Excl</a></td>
                        </tr>
                    </tbody>

                    <!-- MODAL ATUALIZAR -->
                    <div id="attModal{{$item->id}}" class="modal fade" role="dialog">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">Adicionar Produto</h4>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>
                                <div class="modal-body">
                                    <form method="POST" action="update" enctype="multipart/form-data">
                                        {{csrf_field ()}}
                                        <input type="hidden" name="id" value="{{$item->id}}">
                                        <div class="form-group">
                                            <label for="nome">Produto</label>
                                            <input type="text" name="nome" value="{{$item->nome}}" id="nome" required class="form-control" placeholder="Nome do Produto">
                                        </div>
                                        <div class="form-group">
                                            <label for="descricao">Descrição</label>
                                            <textarea class="form-control"  required name="descricao" id="descricao" rows="3">{{$item->descricao}}</textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="valor">Valor</label>
                                            <input type="number" step="0.01" required value="{{$item->valor}}" name="valor" id="valor" class="form-control" placeholder="Nome do Produto">
                                        </div>
                                        <div class="custom-file">
                                            <label for="imgP"  >Imagem Principal</label>
                                            <input type="file"  name="imgP" id="imgP" placeholder="Nome do Produto">
                                        </div>
                                        <br><br>
                            
                                        <button type="submit" value="Enviar" class="btn btn-info btn-block" style="color:white;font-size:20px;"><b>Atualizar Produto</b></button>
                                    </form>
                                </div>
                                <div class="modal-footer">
                
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                @else
                    <hr>
                    <h4>Sem itens no momento.</h4>
                @endif
            </table>
        </div>
    </div>
    
    <!-- MODAL ADD -->
    <div id="addModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Adicionar Produto</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <form method="POST" enctype="multipart/form-data">
                        {{csrf_field ()}}
                        <div class="form-group">
                            <label for="nome">Produto</label>
                            <input type="text" name="nome" id="nome" required class="form-control" placeholder="Nome do Produto">
                        </div>
                        <div class="form-group">
                            <label for="descricao">Descrição</label>
                            <textarea class="form-control" required name="descricao" id="descricao" rows="3"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="valor">Valor</label>
                            <input type="number" step="0.01" required name="valor" id="valor" class="form-control" placeholder="Nome do Produto">
                        </div>
                        <button type="submit" value="Enviar" class="btn btn-info btn-block" style="color:white;font-size:20px;"><b>Adicionar Produto</b></button>
                    </form>
                </div>
                <div class="modal-footer">

                </div>
            </div>
        </div>
        <br><br><br>
        
    </div>
</body>
</html>