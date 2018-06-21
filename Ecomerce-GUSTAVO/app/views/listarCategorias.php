<?php
    include_once("../controllers/Categoria_Controller.php");
    $categoria = new Categoria_Controller;
    $listar = $categoria->listar();
    $quant = count($listar);

    include_once("../controllers/Carrinho_Controller.php");
    $carrinho = new Carrinho_Controller;
    $list = $carrinho->listar();
    $quantia = count($list);
?>
<!DOCTYPE HTML>
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
                <div class="row">
                    <input type="hidden" name="idCategoria" id="idCategoria" value=" <? echo $id; ?>">
                    <table class="table table-bordered">
                        <thead>
                            <tr class="col-md-12">
                                <th scope="col" class="text-center">Produto</th>
                                <th scope="col" class="text-center">Funções</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php for ($i=0; $i < $quant; $i++) { ?>
                                <tr>
                                    <td class="text-center"><a href="visualizarCategoria.php?id=<?php echo $listar[$i]->id?>"><?php echo $listar[$i]->nome?></a></td>
                                    <td class="text-center"><a href="alterarCategoria.php?id=<?php echo $listar[$i]->id?>"><button class="btn btn-primary">Alterar</button></a> <button type="button" class="btn btn-danger" onclick="incrementId(<?php echo $listar[$i]->id?>);" data-toggle="modal" data-target="#deleteModal">Excluir</button></td>
                                </tr>

                            <?php } ?>
                        </tbody>
                    </table>
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
                    $("#deletar").attr('href', '../actions/deletarCategoria.php?id='+id);

                }

            </script>
        </body>
    </head>
</html>