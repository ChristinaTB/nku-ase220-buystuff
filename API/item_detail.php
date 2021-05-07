
<?php
require(__DIR__.'/lib_db.php');
require(__DIR__.'/lib_session.php');
header('Content-type: application/json');


// $stmt = $pdo->prepare('SELECT ID, item_name, item_price, item_detail, item_picture, user_ID FROM items WHERE ID=?');


$stmt = $pdo->prepare('SELECT items.ID, item_name, item_price, item_detail, item_picture, users.firstname, users.lastname, users.email FROM (items INNER JOIN users on items.ID = users.ID) WHERE items.ID= ?');
// $stmt->execute([]);
 


$stmt->execute([$_GET['itemID']]);
//could be $stmt ->execute([]);
$post= $stmt->fetch();

// print_r($_GET['ID']);
die(json_encode($post));
//to seperate html and php and put into json
// die( json_encode($stmt->fetchALL()));
print_r($post);







?>

