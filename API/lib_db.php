<?php
// set the parameters for the database
$host = 'localhost:3308';
$db= 'buystuff';
$user = 'root';
$pass = '';
$charset = 'utf8';
$dsn= "mysql:host=$host;dbname=$db;charset=$charset";

$opt = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES => false,
];

//Creates a new connection
$pdo= new PDO($dsn, $user, $pass, $opt);



// $host = 'us-cdbr-east-03.cleardb.com';
// $db= 'heroku_a89114b2c9653f0';
// $user = 'b86f3046bbfa63';
// $pass = '6b3e5433';
// $charset = 'utf8';
// $dsn= "mysql:host=$host;dbname=$db;charset=$charset";

// $opt = [
//     PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
//     PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
//     PDO::ATTR_EMULATE_PREPARES => false,
// ];

// //Creates a new connection
// $pdo= new PDO($dsn, $user, $pass, $opt);



// $pdo ->query('CREATE TABLE items (
//     ID int(11) NOT NULL,
//     item_name varchar(96) CHARACTER SET utf16 NOT NULL,
//     item_price int(11) NOT NULL,
//     item_detail varchar(144) NOT NULL,
//     item_picture varchar(150) NOT NULL,
//     user_ID int(11) NOT NULL
//   ) ENGINE=InnoDB DEFAULT CHARSET=utf8');
  
//    $pdo->query("INSERT INTO `items` (`ID`, `item_name`, `item_price`, `item_detail`, `item_picture`, `user_ID`) VALUES
//   (1, 'Trek Bicycle', 10000, 'This is a E-Caliber 9.8 XT Bike. This bike is top of the line mountain bikes. Its is no ordinary boke but is also electric.', 'https://trek.scene7.com/is/image/TrekBicycleProducts/ECaliber98XTUS_21_34670_C_Portrait?$responsive-pjpg$&cache=on,on&wid=1024&hei=768', 1),
//   (2, 'shirt', 30, 'has holes in it', 'https://static.nike.com/a/images/t_PDP_1280_v1/f_auto,q_auto:eco/aff24075-a6cf-4f55-bfee-a38777a3c3fd/sportswear-older-t-shirt-KhxF0n.png', 2),
//   (3, 'Wedding Ring', 5000, 'This is a pair of wedding rings for both man and female. Stopped the wedding and dont need the rings anymore. ', 'https://i.ebayimg.com/images/g/dcEAAOSw1YRcbgPc/s-l300.jpg', 3),
//   (4, 'shoes', 2000, 'good', 'https://images.dsw.com/is/image/DSWShoes/460643_002_ss_01?$colpg$', 2);");
  
?>


?>