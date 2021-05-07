
<?php
require(__DIR__.'/lib_db.php');
require(__DIR__.'/lib_session.php');
header('Content-type: application/json');

$stmt = $pdo->prepare('SELECT items.ID, item_name, item_price, item_detail, item_picture, users.firstname, users.lastname, users.email FROM (items INNER JOIN users on items.ID = users.ID) WHERE items.ID= ?');

$stmt->execute([$_GET['itemID']]);

$post= $stmt->fetch();

die(json_encode($post));
//to seperate html and php and put into json

print_r($post);







?>

