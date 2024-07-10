<?php
    session_start();

    if(isset($_SESSION['loggedin']) === false || $_SESSION['loggedin'] === false)
    {
        header('Location: ../index.php');
        exit;
    }

    if(ctype_digit($_POST['contact']) == false || strlen($_POST['contact']) < 11 || $_POST['contact'][0] == '0' || $_POST['contact'][1] == '0' || $_POST['contact'][2] != '9' || str_contains($_POST['contact'], ' '))
    {
        $error = "O contato foi digitado incorretamente.";
        header('Location: add_supplier.php?contact_error=' . urlencode($error));
        exit;
    }

    if(ctype_digit($_POST['cnpj']) == false || strlen($_POST['cnpj']) < 14 || str_contains($_POST['cnpj'], ' '))
    {
        $error = "O CNPJ foi digitado incorretamente.";
        header('Location: add_supplier.php?cnpj_error=' . urlencode($error));
        exit;
    }

    $contact = '';
    for($i = 0; $i < 14; $i++)
    {
        if($i === 0)
        {
            $contact = $contact . '(';
        } elseif($i < 3) {
            $contact = $contact . $_POST['contact'][$i - 1];
        } elseif($i === 3) {
            $contact = $contact . ') ';    
        } else if($i < 9) {
            $contact = $contact . $_POST['contact'][$i - 2];    
        } else if($i === 9) {
            $contact = $contact . '-';
        } else {
            $contact = $contact . $_POST['contact'][$i - 3];  
        }
    }

    $cnpj = '';
    for($j = 0; $j < 18; $j++)
    {
        if($j < 2)
        {
            $cnpj = $cnpj . $_POST['cnpj'][$j];
        } else if($j === 2) {
            $cnpj = $cnpj . '.';
        } else if($j < 6) {
            $cnpj = $cnpj . $_POST['cnpj'][$j - 1];
        } elseif($j === 6) {
            $cnpj = $cnpj . '.';
        } elseif($j < 10) {
            $cnpj = $cnpj . $_POST['cnpj'][$j - 2];
        } elseif($j === 10) {
            $cnpj = $cnpj . '/';
        } else if($j < 15) {
            $cnpj = $cnpj . $_POST['cnpj'][$j - 3];
        } else if($j === 15) {
            $cnpj = $cnpj . '-';
        } else {
            $cnpj = $cnpj . $_POST['cnpj'][$j - 4];
        }
    }

    $new_supplier = array('name' => $_POST['name'], 'email' => $_POST['email'], 'contact' => $contact, 'address' => $_POST['address'], 'cnpj' => $cnpj);

    array_push($_SESSION['suppliers'], $new_supplier);

    header('Location: ./suppliers.php');
?>