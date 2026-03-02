<?php

function getPDO(): PDO
{
    $dsn = 'mysql:host=127.0.0.1;dbname=tomtroc;charset=utf8mb4';
    $user = 'root';
    $pass = ''; // XAMPP : souvent vide

    $options = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    ];

    return new PDO($dsn, $user, $pass, $options);
}
