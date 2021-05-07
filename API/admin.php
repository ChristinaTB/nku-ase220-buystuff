<?php
require(__DIR__.'/lib_session.php');
require(__DIR__.'/lib_db.php');




if($_SESSION['user/is_admin'])
{
    //when the passwoord and email matches
    // echo 'finally';
    // $response= array(
    //     'status' =>1 
    // );

// $useradmin= ['user/is_admin'];
    $status =  1 ;

	$_SESSION['user/is_admin']= $useradmin;

    var_dump($status);
    // print_r($firstsession = $_SESSION['user/ID']);


    // print_r($firstsession);
    
    // print_r($response);
    //  die(json_encode([ $response, 'message'=>'Welcome to our website']));
    
    ; 




    if(!isset($_SESSION['user/admin']))
    {
        
        // require(__DIR__.'/lib_session.php');
        $useradmin = $_SESSION['user/is_admin'] = "";
       $status = -1;
    //    print_r("dsdsd " . $usersession);
       die(json_encode($_SESSION['user/is_admin'] = ""));
       
    
       
        // echo 'This page is for registered users only, Please <a href = "../signin.html">Sign in</a>.';
        //stops the execution
    
        // header("location:../index.html");
        // die();
    
    }
    else
    {
       $usersession = ($_SESSION['user/is_admin']); 
        // header("location:../private.html");
        // $usersession = $_SESSION['user/ID'];
        $status = 1;
        // print_r($usersession);
        
        die(json_encode($useradmin));
    }
    }


?>