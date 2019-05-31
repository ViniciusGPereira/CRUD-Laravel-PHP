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
                <a href="">+</a>
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
                            <td scope="row">{{$item->img}}</td>
                            <td>{{$item->nome}}</td>
                            <td>{{$item->descricao}}</td>
                            <td>{{$item->valor}}</td>
                            <td><a href="">Edit</a> - <a href="">Excl</a></td>
                        </tr>
                    </tbody>
                    @endforeach
                @else
                    <hr>
                    <h4>Sem itens no momento.</h4>
                @endif
            </table>
        </div>
    </div>
    
</body>
</html>