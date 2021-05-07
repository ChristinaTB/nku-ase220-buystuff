<?php
require(__DIR__.'/lib_db.php');
require(__DIR__.'/lib_session.php');


$stmt2 = $pdo->query('CREATE TABLE items (
    ID int(11) NOT NULL,
    item_name varchar(96) CHARACTER SET utf16 NOT NULL,
    item_price int(11) NOT NULL,
    item_detail varchar(144) NOT NULL,
    item_picture varchar(150) NOT NULL,
    user_ID int(11) NOT NULL
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8)');

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


<html>
    <head>
</head>
<body>
    here
</body>
</html>