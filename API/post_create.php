<?php

//tells php to use a file 
require(__DIR__.'/lib_session.php');
//prevent those who are not signed in from creating a post
if(!isset($_SESSION['user/ID']))
{
    echo 'This page is for registered users only, Please <a href = "auth.php">Sign in</a>.';
    //stops the execution
    die();
}



if(count($_POST)> 0)
{
    require('lib_db.php');
    
    $stmt = $pdo->prepare('INSERT INTO posts (title, content, date, img, user_ID) VALUES (?,?,?,?,?)');
    $stmt->execute([$_POST['title'],$_POST['content'],str_replace('T', ' ' , $_POST['date']),$_POST['img'],$_POST['user_ID']]);
 //dont need to fetch due to already having data  $post= $stmt->fetch();

    echo 'Your post has been saved'; 

    print_r($_POST);

}

?>