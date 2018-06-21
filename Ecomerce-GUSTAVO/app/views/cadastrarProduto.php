<?php
    include_once("../controllers/Categoria_Controller.php");
    $categoria = new Categoria_Controller;
    $categorias = $categoria->listar();
    $quant = count($categorias);

    include_once("../controllers/Carrinho_Controller.php");
    $carrinho = new Carrinho_Controller;
    $list = $carrinho->listar();
    $quantia = count($list);
?>

<html lang="pt-br">
    <head>
    <title>Loja RAZER</title>
    <link rel="shortcut icon" href="../../public/img/Nike.png" type="image/x-icon" />
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="../../public/css/style.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <!-- TOPO -->
        <div class="row">
            <div class="col-md-10">
                <a href="index.php"><img class="img-responsive text-center" id="logo" src="../../public/img/Nike.png" alt="Loja NIKE"></a>
            </div>
            <div class="col-md-2">
                <a href="carrinho.php" style="position: relative;">
                    <img class="img-responsive text-center" id="logoCarrinho" src="../../public/img/carrinho.png" alt="Carrinho de Compra">
                    <div class="contadorCarrinho">
                        <span class="label" style="margin-left: 5px;"><?php echo $quantia ?></span>
                    </div>
                </a>
            </div>
        </div><hr>
        <body>
            <!-- MENU -->
            <div class="container bg-verde-musgo">
                <div class="row">
                    <div class="col-12 row">
                        <a class="nav-link" href="index.php"><button class="btn btn-success">Início</button></a>
                        <a class="nav-link" href="cadastrarProduto.php"><button class="btn btn-success">Cadastrar Produto</button></a>
                        <a class="nav-link" href="listarProdutos.php"><button class="btn btn-success">Listar Produtos</button></a>
                        <a class="nav-link" href="cadastrarCategoria.php"><button class="btn btn-success">Cadastrar Categorias</button></a>
                        <a class="nav-link" href="listarCategorias.php"><button class="btn btn-success">Listar Categorias</button></a>
                    </div>
                </div>
            </div><br>

            <!-- CONTEUDO -->
            <div class="container">
                <form id="cadastrarProduto" enctype="multipart/form-data" method="post" role="cadastrarProduto" onsubmit="return false;" accept-charset="utf-8">
                    <input type="hidden" name="cadastrarProduto" id="cadastrarProduto" />
                    <div class="row">
                        <div class="col-md-12 row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <b><label>Nome:</label></b>
                                    <input class="form-control" type="text" id="nome" name="nome" placeholder="Nome do Produto" required>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <b><label>Categoria:</label></b>
                                    <select class="form-control" id="categoria" name="categoria" required>
                                        <option value="0">Selecione uma categoria</option>
                                        <?php for ($i=0; $i < $quant; $i++) { ?>
                                            <option value="<?php echo $categorias[$i]->nome?>"><?php echo $categorias[$i]->nome ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <b><label>Preço:</label></b>
                                    <input class="form-control" type="text" id="preco" name="preco" placeholder="Preço do Produto" required>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <b><label>Descrição:</label></b>
                                    <input class="form-control" type="text" id="descricao" name="descricao" placeholder="Descrição do Produto" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <a href="index.php"><button type="button" class="btn btn-danger">Cancelar</button></a>
                                    <button type="submit" onclick="cadastrar()" class="btn btn-success">Salvar</button>
                                </div>
                            </div>
                        </div><br>
                    </div>
                </form>
            </div>
            <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
            <script src="../../public/js/jquery.js"></script>
            <script src="../../public/js/jquery.mask.js"></script>
        </body>
    </head>
</html>
<script>
    function cadastrar() {
        if($('#nome').val() == '' || $('#categoria').val() == '' || $('#preco').val() == '' || $('#descricao').val() == ''){

            alert('Preencha os campos obrigatorios.')
            return false;

        } else {
            var dados = $('#cadastrarProduto').serialize();
            $.ajax({
                //Envia os valores para action
                url: '../actions/cadastrarProduto.php',
                type: 'post',
                dataType: 'html',
                data: dados,
                success: function(result){
                    if(result == 'Cadastro realizado com sucesso.'){
                        alert(result);
                        setTimeout("document.location = './cadastrarProduto.php'", 1000);
                    } else {
                        alert("Falha ao cadastrar Produto.");
                    }
                }
            });

        }

    }

</script>
