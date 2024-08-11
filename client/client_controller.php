<?php
    session_start();

    include_once "../crud_manager.php";

    if(isset($_SESSION['loggedin']) === false || $_SESSION['loggedin'] === false)
    {
        header('Location: ../index.php');
        exit;
    }

    switch ($_POST['action']) 
    {
        case 'insert':
            $new_client = array('name' => $_POST['name'], 'email' => $_POST['email'], 'contact' => $_POST['contact'], 'address' => $_POST['address'], 'cpf' => $_POST['cpf']);
            
            Insert("../database/client", $new_client);

            $_SESSION['clients'] = Read("../database/client");

            header('Location: ./clients.php');
            break;
        case 'read':
            $_SESSION['clients'] = Read("../database/client");
            break;
        case 'update':
            $new_client = array('name' => $_POST['name'], 'email' => $_POST['email'], 'contact' => $_POST['contact'], 'address' => $_POST['address'], 'cpf' => $_POST['cpf']);
            
            Update("../database/client", $_POST['id'], $new_client);

            $_SESSION['clients'] = Read("../database/client");

            header('Location: ./clients.php');
            break;
        case 'delete':
            Delete("../database/client", $_POST['id']);

            $_SESSION['clients'] = Read("../database/client");

            header('Location: ./clients.php');
            break;
        default:
            break;
    }
?>