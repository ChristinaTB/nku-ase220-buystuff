<?php
require(__DIR__.'/lib_db.php');
require(__DIR__.'/lib_session.php');


// $stmt2 = $pdo->query("INSERT INTO `items` (`ID`, `item_name`, `item_price`, `item_detail`, `item_picture`, `user_ID`) VALUES
// (1, 'Trek Bicycle', 10000, 'This is a E-Caliber 9.8 XT Bike. This bike is top of the line mountain bikes. Its is no ordinary boke but is also electric.', 'https://trek.scene7.com/is/image/TrekBicycleProducts/ECaliber98XTUS_21_34670_C_Portrait?$responsive-pjpg$&cache=on,on&wid=1024&hei=768', 1),
// (2, 'shirt', 30, 'has holes in it', 'https://static.nike.com/a/images/t_PDP_1280_v1/f_auto,q_auto:eco/aff24075-a6cf-4f55-bfee-a38777a3c3fd/sportswear-older-t-shirt-KhxF0n.png', 2),
// (3, 'Wedding Ring', 5000, 'This is a pair of wedding rings for both man and female. Stopped the wedding and dont need the rings anymore. ', 'https://i.ebayimg.com/images/g/dcEAAOSw1YRcbgPc/s-l300.jpg', 3),
// (4, 'shoes', 2000, 'good', 'https://images.dsw.com/is/image/DSWShoes/460643_002_ss_01?$colpg$', 2);");

// $stmt2->execute([]);
// var_dump($stmt2);

$stmt = $pdo->prepare('SELECT * FROM items');
$stmt->execute([]);

//telling the browser its json and not an html document
header('Content-type:application/json');

// ini_set('display_errors', 1);

//to seperate html and php and put into json
die( json_encode($stmt->fetchAll()));

?>


