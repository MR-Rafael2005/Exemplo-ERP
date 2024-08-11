<?php
    session_start();

    if(isset($_SESSION['loggedin']) === false || $_SESSION['loggedin'] === false)
    {
        header('Location: ../index.php');
        exit;
    }

    echo "<pre>";
    
        var_dump($_SESSION['suppliers']);
        var_dump($_SESSION['suppliers'][$_GET['id']][0]);
        var_dump($_GET['id']);
    ECHO "</pre>";
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    
    <title>Modificar Fornecedor</title>
</head>
<body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <div class="row">
        <div class="col-2"></div>

        <div class="col-8">
        <legend>Modificar o Fornecedor <strong><?php echo $_SESSION['suppliers'][$_GET['id']][0];?></strong></legend>
    
            <form class="row g-3" action="./supplier_controller.php" method="POST">
                <div class="col-12">
                    <label for="inputEmail4" class="form-label">Nome</label>
                    <input type="text" class="form-control" id="inputEmail4" name="name" value="<?php echo $_SESSION['suppliers'][$_GET['id']][0];?>" required>
                </div>
                <div class="col-md-6">
                    <label for="inputEmail4" class="form-label">Email</label>
                    <input type="email" class="form-control" id="inputEmail4" name="email" placeholder="email@email.com" value="<?php echo $_SESSION['suppliers'][$_GET['id']][1];?>" required>
                </div>
                <div class="col-md-6">
                    <label for="inputPassword4" class="form-label">Contato</label>
                    <input type="text" class="form-control" id="contact" name="contact" placeholder="Apenas números" maxlength="11" value="<?php echo $_SESSION['suppliers'][$_GET['id']][2];?>" required>
                </div>

                <?php
                    if (isset($_GET['contact_error'])) {
                        echo '<p style="color:red;">' . htmlspecialchars($_GET['contact_error']) . '</p>';
                    }
                ?>

                <div class="col-12">
                    <label for="inputAddress" class="form-label">Endereço</label>
                    <input type="text" class="form-control" id="inputAddress" placeholder="Cidade, Rua/Avenida, Número" name="address" value="<?php echo $_SESSION['suppliers'][$_GET['id']][3];?>" required>
                </div>
                <div class="col-md-6">
                    <label for="inputCity" class="form-label">CNPJ</label>
                    <input type="text" class="form-control" id="cnpj" name="cnpj" placeholder="Apenas números" maxlength="14" value="<?php echo $_SESSION['suppliers'][$_GET['id']][4];?>" required>
                </div>

                <?php
                    if (isset($_GET['cnpj_error'])) {
                        echo '<p style="color:red;">' . htmlspecialchars($_GET['cnpj_error']) . '</p>';
                    }
                ?>

                <input type="hidden" name="id" value="<?=$_GET['id'];?>">
                <input type="hidden" value="update" name="action">

                <div class="col-12">
                    <button type="submit" class="btn btn-primary">Adicionar</button>
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
            $('#cnpj').mask('00.000.000/0000-00');
            $('#contact').mask('(00) 00000-0000');
        });
    </script>
</body>
</html>