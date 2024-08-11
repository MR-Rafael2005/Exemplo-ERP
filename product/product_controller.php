<?php
    session_start();

    if(isset($_SESSION['loggedin']) === false || $_SESSION['loggedin'] === false)
    {
        header('Location: ../index.php');
        exit;
    }

    include_once "../crud_manager.php";

    switch ($_POST['action']) {
        case 'insert':
            $new_product = array('name' => $_POST['name'], 'code' => $_POST['code'], 'supplier' => $_POST['supplier'], 'price' => $_POST['price'], 'amount' => $_POST['amount'], 'profit' => $_POST['profit']);

            $added = Insert("../database/product", $new_product);
            
            if($added)
            {
                $_SESSION['products'] = Read("../database/product");
                header('Location: ./products.php');
            } else {
                $error = "Ocorreu um erro ao salvar o produto";
                header('Location: ./add_product.php?profit_error=' . urlencode($error));
            }
            
            break;
        
        case 'read' :
            $productsData = Read("../database/product");
            if($productsData === null){

            } else {
                $_SESSION['products'] = $productsData;
            }
            break;
        case 'update' :
            $mod_product = array('name' => $_POST['name'], 'code' => $_POST['code'], 'supplier' => $_POST['supplier'], 'price' => $_POST['price'], 'amount' => $_POST['amount'], 'profit' => $_POST['profit']);

            $upped = Update("../database/product", $_POST['id'], $mod_product);

            if($upped)
            {
                $_SESSION['products'] = Read("../database/product");
                header('Location: ./products.php');
            } else {
                $error = "Ocorreu um erro ao modificar o produto";
                header('Location: ./mod_product.php?profit_error=' . urlencode($error));
            }
            break;
        case 'delete' :
            Delete("../database/product", $_POST['id']);
            $_SESSION['products'] = Read("../database/product");
            header('Location: ./products.php');
            break;
        default:
            break;
    }
?>