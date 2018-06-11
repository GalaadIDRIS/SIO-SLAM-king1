<?php

    session_start();

    if(!isset($_SESSION['client'])){
        $_SESSION['client'] = "";
        $_SESSION['ids'] = array();
        $_SESSION['noms'] = array();
        $_SESSION['formats'] = array();
        $_SESSION['prix'] = array();
        $_SESSION['total'] = null;
    }

    try{
        $bdd = new PDO('mysql:host=localhost; dbname=kingpizza; charset=utf8', 'root', '');   
    } catch(PDOException $e){
        die('ERREUR :: '.$e->getMessage());
    }

?>

<!doctype html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
        <title>King Pizza - Pizzeria à Grenoble</title>
        <link rel="icon" type="image/png" href="css/images/icone.png" />
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
        <link rel="stylesheet" href="css/footer.css">
        <link rel="stylesheet" href="css/barre.css">
        <link rel="stylesheet" href="css/menu.css">
        <link rel="stylesheet" href="css/menuResponsive.css">
        <link rel="stylesheet" href="css/dawn.css">
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body>s