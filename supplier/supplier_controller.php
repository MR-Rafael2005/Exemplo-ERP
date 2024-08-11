<?php
    session_start();

    include_once "../crud_manager.php";

    if(isset($_SESSION['loggedin']) === false || $_SESSION['loggedin'] === false)
    {
        header('Location: ../index.php');
        exit;
    }

    switch ($_POST['action']) {
        case 'insert':
            $new_supplier = array('name' => $_POST['name'], 'email' => $_POST['email'], 'contact' => $_POST['contact'], 'address' => $_POST['address'], 'cnpj' => $_POST['cnpj']);

            Insert("../database/supplier", $new_supplier);

            $_SESSION['suppliers'] = Read("../database/supplier");

            header('Location: ./suppliers.php');
            break;
        case 'read':
            $_SESSION['suppliers'] = Read("../database/supplier");
            break;
        case 'update':
            $new_supplier = array('name' => $_POST['name'], 'email' => $_POST['email'], 'contact' => $_POST['contact'], 'address' => $_POST['address'], 'cnpj' => $_POST['cnpj']);

            Update("../database/supplier", $_POST['id'], $new_supplier);

            $_SESSION['suppliers'] = Read("../database/supplier");

            header('Location: ./suppliers.php');
            break;
        case 'delete':
            Delete("../database/supplier", $_POST['id']);
            $_SESSION['suppliers'] = Read("../database/supplier");
            header('Location: ./suppliers.php');
            break;
        
        default:
            break;
    }
    
    
?>