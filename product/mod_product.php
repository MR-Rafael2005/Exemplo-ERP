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
    
    <title>Modificar Produto</title>
</head>
<body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <div class="row">
        <div class="col-2"></div>

        <div class="col-8">
            <legend>Modificar o Produto <strong><?php echo $_SESSION['products'][$_GET['id']][0];?></strong></legend>
    
            <form class="row g-3" action="./product_controller.php" method="POST">
                <div class="col-md-6">
                    <label for="inputEmail4" class="form-label">Nome</label>
                    <input type="text" class="form-control" id="inputEmail4" name="name" value="<?php echo $_SESSION['products'][$_GET['id']][0];?>" required>
                </div>
                <div class="col-md-6">
                    <label for="inputPassword4" class="form-label">Codigo</label>
                    <input type="text" class="form-control" id="code" name="code" maxlength="9" value="<?php echo $_SESSION['products'][$_GET['id']][1];?>" required>
                </div>
                <?php
                    if (isset($_GET['code_error'])) {
                        echo '<p style="color:red;">' . htmlspecialchars($_GET['code_error']) . '</p>';
                    }
                ?>
                <div class="col-md-6">
                    <label for="inputCity" class="form-label">Preço</label>
                    <input type="text" class="form-control" id="price" name="price" value="<?php echo $_SESSION['products'][$_GET['id']][3];?>" required>
                </div>
                <?php
                    if (isset($_GET['price_error'])) {
                        echo '<p style="color:red;">' . htmlspecialchars($_GET['price_error']) . '</p>';
                    }
                ?>
                <div class="col-md-6">
                    <label for="inputCity" class="form-label">Quantidade</label>
                    <input type="number" class="form-control" id="inputCity" name="amount" value="<?php echo $_SESSION['products'][$_GET['id']][4];?>" required>
                </div>
                <div class="col-md-6">
                    <label for="inputCity" class="form-label">Lucro(por unidade)</label>
                    <input type="text" class="form-control" id="profit" name="profit" value="<?php echo $_SESSION['products'][$_GET['id']][5];?>" required>
                </div>
                <?php
                    if (isset($_GET['profit_error'])) {
                        echo '<p style="color:red;">' . htmlspecialchars($_GET['profit_error']) . '</p>';
                    }
                ?>
                <div class="col-md-6">
                    <label for="inputState" class="form-label">Fornecedor</label>
                    <select id="inputState" class="form-select" name="supplier">
                    <option selected><?php if(isset($_SESSION['suppliers'][$_GET['id']][0])) {echo $_SESSION['suppliers'][$_GET['id']][0];} else { echo $_SESSION['suppliers'][0][0]; } ?></option>
                    <?php for ($i = 1; $i < sizeof($_SESSION['suppliers']); $i++): ?>
                        <option><?php echo $_SESSION['suppliers'][$i][0]; ?></option>
                    <?php endfor; ?>
                    </select>
                </div>
                
                <input type="hidden" name="id" value="<?=$_GET['id'];?>">
                <input type="hidden" value="update" name="action">

                <div class="col-12">
                    <button type="submit" class="btn btn-primary">Modificar</button>
                </div>
            </form>
        </div>
        <div class="col-2"></div>
    </div>

    <script src="../assets/dist/js/jquery.min.js"></script>
    <script src="../assets/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/dist/js/jquery.mask.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#code').mask('000000000');
            $('#price').mask('R$ 000,00');
            $('#profit').mask('R$ 00,00');
        });
    </script>
</body>
</html>