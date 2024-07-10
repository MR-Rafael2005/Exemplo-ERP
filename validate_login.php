<?php
    session_start();

    if(empty($_SESSION['loggedin']) === false && $_SESSION['loggedin'] === true)
    {
        header('Location: ./client/clients.php');
        exit;
    }
    
    $standart_EMAIL = "admin@admin.com";
    $standart_PASSWORD = "admin";

    $email = $_POST['email'];
    $password = $_POST['password'];

    if($email === $standart_EMAIL && $password === $standart_PASSWORD)
    {
        $_SESSION['loggedin'] = true; 

        if(empty($_SESSION['suppliers']))
        {
            $_SESSION['suppliers'] = array(
                array('name' => 'coca-coca', 'email' => 'cocacoca@email.com', 'contact' => '(88) 99889-4234', 'address' => 'Ceará, Av. A', 'cnpj' => '12.345.678/0001-00'),
                array('name' => 'coca-poca', 'email' => 'cocapoca@email.com', 'contact' => '(88) 99889-3234', 'address' => 'Ceará, Av. H', 'cnpj' => '12.345.678/0001-01'),
                array('name' => 'cola-soda', 'email' => 'cocasoda@email.com', 'contact' => '(88) 99889-2234', 'address' => 'Ceará, Av. J', 'cnpj' => '12.345.678/0001-02'),
                array('name' => 'coca-pepi', 'email' => 'cocapepi@email.com', 'contact' => '(88) 99889-1434', 'address' => 'Ceará, Av. F', 'cnpj' => '12.345.678/0001-03'),
                array('name' => 'coca-mola', 'email' => 'cocamola@email.com', 'contact' => '(88) 99889-1034', 'address' => 'Ceará, Av. S', 'cnpj' => '12.345.678/0001-04'),
                array('name' => 'coca-fruta', 'email' => 'cocafruta@email.com', 'contact' => '(88) 99889-1834', 'address' => 'Ceará, Av. Q', 'cnpj' => '12.345.678/0001-05'),
                array('name' => 'coca-da', 'email' => 'cocada@email.com', 'contact' => '(88) 99889-1634', 'address' => 'Ceará, Av. W', 'cnpj' => '12.345.678/0001-06'),
                array('name' => 'pa-coca', 'email' => 'pacoca@email.com', 'contact' => '(88) 99889-1534', 'address' => 'Ceará, Av. T', 'cnpj' => '12.345.678/0001-07'),
                array('name' => 'nova-coca', 'email' => 'novacoca@email.com', 'contact' => '(88) 99889-1134', 'address' => 'Ceará, Av. U', 'cnpj' => '12.345.678/0001-08'),
                array('name' => 'soca-coca', 'email' => 'socacoca@email.com', 'contact' => '(88) 99889-1334', 'address' => 'Ceará, Av. O', 'cnpj' => '12.345.678/0001-09')
            );
        }
        
        if(empty($_SESSION['products']))
        {
            $_SESSION['products'] = array(
                array('name' => 'coca-coca', 'code' => '023456789', 'supplier' => $_SESSION['suppliers'][0]['name'], 'price' => 10.99, 'amount' => 120, 'profit' => 2.50),
                array('name' => 'coca-pipoca', 'code' => '123456789', 'supplier' => $_SESSION['suppliers'][1]['name'], 'price' => 12.99, 'amount' => 110, 'profit' => 3.50),
                array('name' => 'coca-zero', 'code' => '223456789', 'supplier' => $_SESSION['suppliers'][2]['name'], 'price' => 13.99, 'amount' => 100, 'profit' => 4.00),
                array('name' => 'pepi-cola', 'code' => '323456789', 'supplier' => $_SESSION['suppliers'][3]['name'], 'price' => 16.99, 'amount' => 54, 'profit' => 5.30),
                array('name' => 'coca-molango', 'code' => '423456789', 'supplier' => $_SESSION['suppliers'][4]['name'], 'price' => 9.99, 'amount' => 45, 'profit' => 1.50),
                array('name' => 'coca-tuti', 'code' => '523456789', 'supplier' => $_SESSION['suppliers'][5]['name'], 'price' => 6.99, 'amount' => 70, 'profit' => 1.10),
                array('name' => 'coca-coco', 'code' => '623456789', 'supplier' => $_SESSION['suppliers'][6]['name'], 'price' => 7.99, 'amount' => 13, 'profit' => 0.50),
                array('name' => 'paçoca-coca', 'code' => '723456789', 'supplier' => $_SESSION['suppliers'][7]['name'], 'price' => 14.50, 'amount' => 69, 'profit' => 2.40),
                array('name' => 'coca-ultra', 'code' => '823456789', 'supplier' => $_SESSION['suppliers'][8]['name'], 'price' => 13.40, 'amount' => 34, 'profit' => 3.50),
                array('name' => 'coca-sorvete', 'code' => '923456789', 'supplier' => $_SESSION['suppliers'][9]['name'], 'price' => 10.20, 'amount' => 90, 'profit' => 1.20),
            );
        }

        if(empty($_SESSION['clients']))
        {
            $_SESSION['clients'] = array(
                array('name' => 'João Paulo', 'email' => 'joaopaulo@email.com', 'contact' => '(88) 99119-9190', 'address' => 'Sobral, Rua A, n:390', 'cpf' => '123-456-789-01'),
                array('name' => 'João Marcos', 'email' => 'joaomarcos@email.com', 'contact' => '(88) 99119-9191', 'address' => 'Sobral, Rua B, n:391', 'cpf' => '123-456-789-11'),
                array('name' => 'João Vitor', 'email' => 'joaovitor@email.com', 'contact' => '(88) 99119-9192', 'address' => 'Sobral, Rua C, n:392', 'cpf' => '123-456-789-21'),
                array('name' => 'João Filipe', 'email' => 'joaofilipe@email.com', 'contact' => '(88) 99119-9193', 'address' => 'Sobral, Rua D, n:393', 'cpf' => '123-456-789-31'),
                array('name' => 'João Pedro', 'email' => 'joaopedro@email.com', 'contact' => '(88) 99119-9194', 'address' => 'Sobral, Rua S, n:394', 'cpf' => '123-456-789-41'),
                array('name' => 'João Costa', 'email' => 'joaocosta@email.com', 'contact' => '(88) 99119-9195', 'address' => 'Sobral, Rua T, n:395', 'cpf' => '123-456-789-51'),
                array('name' => 'João Silva', 'email' => 'joaosilva@email.com', 'contact' => '(88) 99119-9196', 'address' => 'Sobral, Rua J, n:396', 'cpf' => '123-456-789-61'),
                array('name' => 'João Fernando', 'email' => 'joaofernando@email.com', 'contact' => '(88) 99119-9197', 'address' => 'Sobral, Rua K, n:397', 'cpf' => '123-456-789-71'),
                array('name' => 'João Daniel', 'email' => 'joaodaniel@email.com', 'contact' => '(88) 99119-9198', 'address' => 'Sobral, Rua W, n:398', 'cpf' => '123-456-789-81'),
                array('name' => 'João Savio', 'email' => 'joaosavio@email.com', 'contact' => '(88) 99119-9199', 'address' => 'Sobral, Rua Q, n:399', 'cpf' => '123-456-789-91')
            );
        }
        
        header('Location: ./client/clients.php');
    } else {
        $error = "Email ou senha incorretos.";
        header('Location: index.php?error=' . urlencode($error));
    }
?>