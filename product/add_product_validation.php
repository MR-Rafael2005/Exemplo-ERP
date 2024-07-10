<?php
    session_start();

    if(isset($_SESSION['loggedin']) === false || $_SESSION['loggedin'] === false)
    {
        header('Location: ../index.php');
        exit;
    }

    if(ctype_digit($_POST['code']) == false || str_contains($_POST['code'], ' ') || strlen($_POST['code']) < 9)
    {
        $error = "O codigo do produto foi digitado incorretamente.";
        header('Location: add_product.php?code_error=' . urlencode($error));
        exit;
    }

    if(preg_match('/^[0-9,]+$/', $_POST['price']) == false)
    {
        $error = "O preço foi digitado incorretamente.";
        header('Location: ./add_product.php?price_error=' . urlencode($error));
        exit;
    }

    if(preg_match('/^[0-9,]+$/', $_POST['profit']) == false)
    {
        $error = "O lucro foi digitado incorretamente.";
        header('Location: ./add_product.php?profit_error=' . urlencode($error));
        exit;
    }

    $new_product = array('name' => $_POST['name'], 'code' => $_POST['code'], 'supplier' => $_POST['supplier'], 'price' => $_POST['price'], 'amount' => $_POST['amount'], 'profit' => $_POST['profit']);

    array_push($_SESSION['products'], $new_product);

    header('Location: ./products.php');
?>