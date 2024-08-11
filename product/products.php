<?php
    session_start();

    if(isset($_SESSION['loggedin']) === false || $_SESSION['loggedin'] === false)
    {
        header('Location: ../index.php');
        exit;
    }
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/ebae81de42.js" crossorigin="anonymous"></script>
    <title>Produtos</title>
</head>
<body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">SISTEMA ERP</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="../client/clients.php">Clientes</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="../supplier/suppliers.php">Fornecedores</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="./products.php">Produtos</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="../loggin_out.php">Sair da sessão</a>
                </li>
                
            </ul>
            </div>
        </div>
    </nav>
    <div class="row">
    <div class="col-1"></div>
    
    <div class="col-10">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Codigo</th>
                    <th scope="col">Fornecedor</th>
                    <th scope="col">Preço</th>
                    <th scope="col">Quantidade</th>
                    <th scope="col">Lucro(por unidade)</th>
                    <th scope="col">Ação</th>
                </tr>
            </thead>
            <?php for ($i = 0; $i < sizeof($_SESSION['products']); $i++): ?>
                <tr>
                    <td> <?php echo ($i + 1); ?> </td>
                    <td> <?php echo  $_SESSION['products'][$i][0]; ?></td>
                    <td> <?php echo $_SESSION['products'][$i][1]; ?></td>
                    <td> <?php echo $_SESSION['products'][$i][2]; ?></td>
                    <td> <?php echo $_SESSION['products'][$i][3]; ?></td>
                    <td> <?php echo $_SESSION['products'][$i][4]; ?></td>
                    <td> <?php echo $_SESSION['products'][$i][5]; ?></td>
                    <td>
                        <button class="btn btn-danger btn-md" title="Excluir Produto" data-bs-toggle="modal" data-bs-target="#delete-<?=$i;?>" >
                            <i class="fa-solid fa-trash"></i>
                        </button>
                        
                        <a href="mod_product.php?id=<?=$i;?>" class="btn btn-warning btn-md" title="Editar Produto">
                            <i class="fa fa-pencil"></i>
                        </a>
                    </td>
                </tr>

                <!-- Modal de Exclusão -->
                <div class="modal fade" id="delete-<?=$i;?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <form action="product_controller.php" method="POST">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Excluir Produto?! </h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    Tem certeza que deseja excluir o produto 
                                    <strong> <?= $_SESSION['products'][$i][0]; ?> </strong> !? <br>
                                    Essa operação não pode ser desfeita.
                                    
                                    <input type="hidden" name="action" value="delete">
                                    <input type="hidden" name="id" value="<?=$i;?>">

                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal"><i class="fa fa-ban"></i> Não, cancelar! </button>
                                    <button type="submit" class="btn btn-success">
                                        <i class="fa fa-thumbs-up"></i> Sim, continuar!  
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            <?php endfor; ?>
        </table>
    </div>

    <div class="col-1"></div>
    </div>

    <center>
        <form action="./add_product.php">
            <button type="submit" class="btn btn-success">Adicionar Produto</button>
        </form>
    </center>
</body>
</html>