<?php
require(__DIR__.'/lib_session.php');
require(__DIR__.'/lib_db.php');

if($_SESSION['user/is_admin'])
{

    $status =  1 ;
	$_SESSION['user/is_admin']= $useradmin;
    var_dump($status);
    ; 
    if(!isset($_SESSION['user/admin']))
    {
        $useradmin = $_SESSION['user/is_admin'] = "";
       $status = -1;
       die(json_encode($_SESSION['user/is_admin'] = ""));
    
    }
    else
    {
       $usersession = ($_SESSION['user/is_admin']); 
        $status = 1;
        die(json_encode($useradmin));
    }
}


?>