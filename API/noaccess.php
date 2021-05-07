<?php 
require(__DIR__.'/API/lib_session.php');


// print_r($_SESSION);

if(!isset($_SESSION['user/ID']))
{
    echo 'This page is for registered users only, Please <a href = "auth.html">Sign in</a>.';
    //stops the execution
    die();

}


?>

