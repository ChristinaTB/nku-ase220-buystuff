<?php

require(__DIR__.'/lib_db.php');
require(__DIR__.'/lib_session.php');

if(count($_POST)> 0)
{  
    $stmt = $pdo->prepare('UPDATE items SET item_name = ?, item_price = ?, item_detail = ?, item_picture = ?, user_ID =? WHERE itemID =?');
    $stmt->execute([$_POST['item_name'],$_POST['item_price'], $_POST['item_detail'],$_POST['item_picture'],$_POST['user_ID'],$_POST['ID']]);
//   $post= $stmt->fetch();

//   
    echo 'Your post has been saved'; 

    $stmt = $pdo->prepare('SELECT * FROM items WHERE itemID=?');
    $stmt->execute([$_GET['itemID']]);
    //could be $stmt ->execute([]);
    $post= $stmt->fetch();
    print_r($post);

}

//if the user is not the owner of the post or not log in it cant allow it to display edit feature
 if(isset($_SESSION['user/ID']) || $post['user_ID']!= $_SESSION['user/ID'])
 {
     var_dump($_SESSION['user/ID']);
   header('location:index.php');   
   return;
 }


?>
