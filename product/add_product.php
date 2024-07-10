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
    
    <title>Adicionar Cliente</title>
</head>
<body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <div class="row">
        <div class="col-2"></div>

        <div class="col-8">
            <form class="row g-3" action="./add_product_validation.php" method="POST">
                <div class="col-md-6">
                    <label for="inputEmail4" class="form-label">Nome</label>
                    <input type="text" class="form-control" id="inputEmail4" name="name" required>
                </div>
                <div class="col-md-6">
                    <label for="inputPassword4" class="form-label">Codigo</label>
                    <input type="text" class="form-control" id="inputPassword4" name="code" maxlength="9" required>
                </div>
                <?php
                    if (isset($_GET['code_error'])) {
                        echo '<p style="color:red;">' . htmlspecialchars($_GET['code_error']) . '</p>';
                    }
                ?>
                <div class="col-md-6">
                    <label for="inputCity" class="form-label">Preço</label>
                    <input type="text" class="form-control" id="inputCity" name="price" required>
                </div>
                <?php
                    if (isset($_GET['price_error'])) {
                        echo '<p style="color:red;">' . htmlspecialchars($_GET['price_error']) . '</p>';
                    }
                ?>
                <div class="col-md-6">
                    <label for="inputCity" class="form-label">Quantidade</label>
                    <input type="number" class="form-control" id="inputCity" name="amount" required>
                </div>
                <div class="col-md-6">
                    <label for="inputCity" class="form-label">Lucro(por unidade)</label>
                    <input type="text" class="form-control" id="inputCity" name="profit" required>
                </div>
                <?php
                    if (isset($_GET['profit_error'])) {
                        echo '<p style="color:red;">' . htmlspecialchars($_GET['profit_error']) . '</p>';
                    }
                ?>
                <div class="col-md-6">
                    <label for="inputState" class="form-label">Fornecedor</label>
                    <select id="inputState" class="form-select" name="supplier">
                    <option selected><?php echo $_SESSION['suppliers'][0]['name']; ?></option>
                    <?php for ($i = 1; $i < sizeof($_SESSION['suppliers']); $i++): ?>
                        <option><?php echo $_SESSION['suppliers'][$i]['name']; ?></option>
                    <?php endfor; ?>
                    </select>
                </div>

                <div class="col-12">
                    <button type="submit" class="btn btn-primary">Adicionar</button>
                </div>
            </form>
        </div>
        <div class="col-2"></div>
    </div>
</body>
</html>