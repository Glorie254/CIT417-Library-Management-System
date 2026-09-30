<?php

if (!isset($config)) {
    $config = require __DIR__ . '/../config/app.php';
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title><?= e($config['app_name']) ?></title>

    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>

<main class="container">

    <header>

        <h1><?= e($config['app_name']) ?></h1>

        <nav>
            <a href="index.php">Home</a> |
            <a href="catalogue.php">Catalogue</a> |
            <a href="request-book.php">Request a Book</a>
        </nav>

        <hr>

    </header>