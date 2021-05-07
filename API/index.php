<?php
require(__DIR__.'/lib_db.php');
require(__DIR__.'/lib_session.php');



$stmt = $pdo->prepare('SELECT * FROM items');
$stmt->execute([]);

//telling the browser its json and not an html document
header('Content-type:application/json');

//to seperate html and php and put into json
die( json_encode($stmt->fetchAll()));



?>