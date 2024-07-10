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
        header('Location: add_client.php?contact_error=' . urlencode($error));
        exit;
    }
    if(ctype_digit($_POST['cpf']) == false ||  strlen($_POST['cpf']) < 11 || str_contains($_POST['cpf'], ' '))
    {
        $error = "O cpf foi digitado incorretamente.";
        header('Location: add_client.php?cpf_error=' . urlencode($error));
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

    $cpf = '';
    for($j = 0; $j < 14; $j++)
    {   
        if($j < 3)
        {
            $cpf = $cpf . $_POST['cpf'][$j];
        } else if($j === 3) {
            $cpf = $cpf . '-';
        } else if($j < 7) {
            $cpf = $cpf . $_POST['cpf'][$j - 1];
        } else if($j === 7) {
            $cpf = $cpf . '-';
        } elseif ($j < 11) {
            $cpf = $cpf . $_POST['cpf'][$j - 2];
        } else if($j === 11) {
            $cpf = $cpf . '-';
        } else {
            $cpf = $cpf . $_POST['cpf'][$j - 3];
        }
    }


    $new_client = array('name' => $_POST['name'], 'email' => $_POST['email'], 'contact' => $contact, 'address' => $_POST['address'], 'cpf' => $cpf);
    
    array_push($_SESSION['clients'], $new_client);

    header('Location: ./clients.php');
?>