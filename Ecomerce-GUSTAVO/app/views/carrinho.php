<?php
    include_once("../controllers/Categoria_Controller.php");
    $categoria = new Categoria_Controller;
    $categorias = $categoria->listar();
    $quant = count($categorias);

    include_once("../controllers/Carrinho_Controller.php");
    $carrinho = new Carrinho_Controller;
    $list = $carrinho->listar();
    $quantia = count($list);

    $total = 0;
    for($i=0; $i<count($list); $i++){
        $total += intval($list[$i]->preco)*intval($list[$i]->quantidade);
    }

    include_once("../controllers/Carrinho_Controller.php");
    $carrinho = new Carrinho_Controller;
    $listar = $carrinho->listar();
    $quant = count($listar);
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
                    <span class="label" style="margin-top: 200px; margin-left: -100px; color: red; width: 220px">Preço total: R$<?php echo $total ?>,00</span>
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
                <div class="row">
                        <?php
                        if($quant != 0){
                            for ($i=0; $i < $quant; $i++) {
                        ?>
                    <form id="alterarCarrinho<?php echo $listar[$i]->id?>" enctype="multipart/form-data" method="post" role="alterarCarrinho<?php echo $listar[$i]->id?>" onsubmit="return false;" accept-charset="utf-8">
                        <div class="card" style="width: 18rem; margin-left: 5px; margin-bottom: 5px;">
                            <input type="hidden" name="alterarCarrinho<?php echo $listar[$i]->id?>" id="alterarCarrinho<?php echo $listar[$i]->id?>"/>
                            <img class="card-img-top" src="../../public/img/chuteiras.png" style="margin-top: 5px;" alt="Chuteira">
                            <div class="card-body">
                                <h5 class="card-title"><?= $listar[$i]->nome ?></h5>
                                <p class="card-text">R$<?= $listar[$i]->preco ?>,00</p>
                                <p class="card-text">Quantidade: <input class="form-control" type="number" id="quantidade" name="quantidade" placeholder="Quantidade de Produto" value="<?= $listar[$i]->quantidade?>" min="1" required></p>
                                <div class="form-group">
                                    <button type="button" class="btn btn-success" onclick="alterar(<?php echo $listar[$i]->id?>);">Salvar</button>
                                </div>
                                <div class="form-group">
                                    <button type="button" class="btn btn-danger" onclick="incrementId(<?php echo $listar[$i]->id?>);" data-toggle="modal" data-target="#deleteModal">Excluir do Carrinho</button>
                                </div>
                            </div>
                        </div>
                    </form>
                    <?php
                        }

                        }else{
                    ?>
                        <div class="col-md-12">
                            <div class="form-group">
                                <input class="form-control text-center" type="text" id="item" name="item" placeholder="Não há nenhum item inserido no carrinho." disabled required>
                            </div>
                        </div>
                    <?php
                     } ?>
                </div>
            </div>
            <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
            <script src="../../public/js/jquery.js"></script>
            <script src="../../public/js/jquery.mask.js"></script>

            <!-- Modal -->
            <div id="deleteModal" class="modal fade" role="dialog">
                <div class="modal-dialog">
                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Excluir</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        <div class="modal-body">
                            <p>Deseja realmente excluir esses dados ?</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Não</button>
                            <a id="deletar"><button type="submit" class="btn btn-success" id="deleteSim" data-dismiss="">Sim</button></a>
                        </div>
                    </div>
                </div>
            </div>

            <script>

                function incrementId(id) {
                    $("#deleteSim").attr('onclick', 'deletar('+id+');');
                    $("#deletar").attr('href', '../actions/deletarCarrinho.php?id='+id);

                }

                function alterar(id) {
                    var dados = $('#alterarCarrinho'+id).serialize();
                    $.ajax({
                        //Envia os valores para action
                        url: '../actions/alterarCarrinho.php?id='+id,
                        type: 'post',
                        dataType: 'html',
                        data: dados,
                        success: function(result){
                            if(result == 'Carrinho alterado com sucesso.'){
                                alert(result);
                                setTimeout("document.location = './carrinho.php'", 1000);
                            } else {
                                alert("Falha ao alterar carrinho.");
                            }
                        }
                    });

                }

            </script>
        </body>
    </head>
</html>
