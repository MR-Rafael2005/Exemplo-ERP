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
    
    <title>Modificar Cliente</title>
</head>
<body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <div class="row">
        <div class="col-2"></div>

        <div class="col-8">
            <legend>Modificar o Cliente <strong><?php echo $_SESSION['clients'][$_GET['id']][0];?></strong></legend>

            <form class="row g-3" action="./client_controller.php" method="POST">
                <div class="col-12">
                    <label for="inputEmail4" class="form-label">Nome</label>
                    <input type="text" class="form-control" id="inputEmail4" name="name" required>
                </div>
                <div class="col-md-6">
                    <label for="inputEmail4" class="form-label">Email</label>
                    <input type="email" class="form-control" id="inputEmail4" name="email" placeholder="email@email.com" required>
                </div>
                <div class="col-md-6">
                    <label for="inputPassword4" class="form-label">Contato</label>
                    <input type="text" class="form-control" id="contact" name="contact" placeholder="Apenas números" maxlength="11" required>
                </div>

                <?php
                    if (isset($_GET['contact_error'])) {
                        echo '<p style="color:red;">' . htmlspecialchars($_GET['contact_error']) . '</p>';
                    }
                ?>

                <div class="col-12">
                    <label for="inputAddress" class="form-label">Endereço</label>
                    <input type="text" class="form-control" id="inputAddress" placeholder="Cidade, Rua/Avenida, Número" name="address" required>
                </div>
                <div class="col-md-6">
                    <label for="inputCity" class="form-label">CPF</label>
                    <input type="text" class="form-control" id="cpf" name="cpf" placeholder="Apenas números" maxlength="11" required>
                </div>

                <?php
                    if (isset($_GET['cpf_error'])) {
                        echo '<p style="color:red;">' . htmlspecialchars($_GET['cpf_error']) . '</p>';
                    }
                ?>
                
                <input type="hidden" name="id" value="<?=$_GET['id'];?>">
                <input type="hidden" value="insert" name="action">

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
            $('#cpf').mask('000.000.000-00');
            $('#contact').mask('(00) 00000-0000');
        });
    </script>
</body>
</html>