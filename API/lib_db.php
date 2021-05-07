<?php
//set the parameters for the database
// $host = 'localhost:3308';
// $db= 'buystuff';
// $user = 'root';
// $pass = '';
// $charset = 'utf8';
// $dsn= "mysql:host=$host;dbname=$db;charset=$charset";

// $opt = [
//     PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
//     PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
//     PDO::ATTR_EMULATE_PREPARES => false,
// ];

// //Creates a new connection
// $pdo= new PDO($dsn, $user, $pass, $opt);



$host = 'us-cdbr-east-03.cleardb.com';
$db= 'heroku_a89114b2c9653f0';
$user = 'b86f3046bbfa63';
$pass = '6b3e5433';
$charset = 'utf8';
$dsn= "mysql:host=$host;dbname=$db;charset=$charset";

$opt = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES => false,
];

//Creates a new connection
$pdo= new PDO($dsn, $user, $pass, $opt);



    


?>