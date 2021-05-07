<?php
require(__DIR__.'/lib_db.php');
require(__DIR__.'/lib_session.php');

$stmt = $pdo->prepare('SELECT * FROM items');
$stmt->execute([]);

die( json_encode($stmt->fetchAll()));

?>


