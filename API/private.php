<?php


// require(__DIR__.'/lib_session.php');
require(__DIR__.'/auth.php');

// $_SESSION['user/ID'] = "books@gmail.com";
$idnumber = $_SESSION['user/ID'];

require(__DIR__.'/lib_db.php');

// var_dump(($idnumber));

$stmt = $pdo->prepare('SELECT items.ID, item_name, item_price, item_detail, item_picture, user_ID, users.firstname, users.lastname, users.email FROM (items INNER JOIN users on items.ID = users.ID) WHERE user_ID = '.$idnumber.'');
// $stmt = $pdo->prepare('SELECT ID, item_name, item_price, item_detail, item_picture, user_ID FROM items WHERE user_ID  ');
$stmt->execute([]);
// var_dump($stmt);
//telling the browser its json and not an html document
header('Content-type:application/json');

//to seperate html and php and put into json
die( json_encode($stmt->fetchAll()));

if(!isset($_SESSION['user/ID']))
{
    
    // require(__DIR__.'/lib_session.php');
    $usersession = $_SESSION['user/ID'] = "";
   $status = -1;
//    print_r("dsdsd " . $usersession);
   die(json_encode($_SESSION['user/ID'] = ""));
   

   
    // echo 'This page is for registered users only, Please <a href = "../signin.html">Sign in</a>.';
    //stops the execution

    // header("location:../index.html");
    // die();

}
else
{
   $usersession = ($_SESSION['user/ID']); 
   $_SESSION['user/is_admin']=$user['is_admin'];
    // header("location:../private.html");
    // $usersession = $_SESSION['user/ID'];
    $status = 1;
    // print_r($usersession);
    
    die(json_encode($usersession));
}


if(isset($_GET['action']) && $_GET['action']=='signout' && isset($_SESSION['user/ID'])){
    // require(__DIR__.'/lib_session.php');
    $status =  -1 ;
    if ($status == -1 )
    {
        // signout(); 
        //  echo "You have successfully signed out";
     
         $usersession=  $_SESSION['user/ID'] = "";
           
         session_destroy();
            //  header('location:../index.html') ;
              return;

                
    }
}
 function signout()
        {
        
            session_destroy();
            $_SESSION['user/ID']= "";
        // header('location:../index.html');
    return;

        }
// $stmt = $pdo->prepare('SELECT ID, item_name FROM items');
// var_dump($stmt);
// $stmt->execute([]);

// //telling the browser its json and not an html document
// header('Content-type:application/json');

// //to seperate html and php and put into json
// die( json_encode($stmt->fetchAll()));

        //if the user is not the owner of the post or not log in it cant allow it to display edit feature
 if(isset($_SESSION['user/ID']) || $post['user_ID']!= $_SESSION['user/ID'])
 {
//    header('location:index.php');   



   return;
 }


?>


<!-- 
<html>
<head></head>
<body>

        Signout: <a href = "private.php?action=signout">Sign out</a>

</body>


</html>
 -->

