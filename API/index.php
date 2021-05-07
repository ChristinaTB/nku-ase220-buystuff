<?php
require(__DIR__.'/lib_db.php');
require(__DIR__.'/lib_session.php');


$stmt2 = $pdo->query("ALTER TABLE `items`
MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;'");

$stmt2->execute([]);
var_dump($stmt2);

$stmt = $pdo->prepare('SELECT * FROM items');
$stmt->execute([]);

//telling the browser its json and not an html document
header('Content-type:application/json');

ini_set('display_errors', 1);

//to seperate html and php and put into json
die( json_encode($stmt->fetchAll()));

?>


