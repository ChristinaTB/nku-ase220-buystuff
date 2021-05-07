<?php
require(__DIR__.'/lib_session.php');
require(__DIR__.'/lib_db.php');


if(isset($_GET['action']) && $_GET['action']=='signout' && isset($_SESSION['user/ID'])){

    $status =  -1 ;
    if ($status == -1 )
    {
        session_destroy(); 
        header('location:../index.html') ;
        return;
                
    }
    
}


if(count($_POST)>0)
{
    switch($_POST['action'])
    {
        case 'signin':
            signin($_POST['email'], $_POST['password']);
            break;
        case 'signup':
            signup($_POST['email'], $_POST['password'], $_POST['firstname'], $_POST['lastname']);
            break;
    }
}


function signin($email, $password)
{
    require(__DIR__.'/lib_db.php');

    $query = $pdo -> prepare('SELECT  ID, email, password, is_admin FROM users WHERE email= ?');
    $query->execute([$email]);

    $no = $query->rowCount();
    $user= $query->fetch();
  if($no == 0)
  {
    $status =  -1 ;
      echo "there is no one under that email/password, please register";
      signup();
      die();
  }
   
 


$userPassword = $_POST['password'];
$datapassword = $user['password'];
$useremmail = $_POST['email'];
$dataemail = $user['email'];
$userIDs = $user['ID'];
$useradmin= $user['is_admin'];



if($userPassword == $datapassword && $useremmail == $dataemail)
{

    $status =  1 ;
    $_SESSION['user/ID']=$userIDs;
	$_SESSION['user/is_admin']= $useradmin;

    print_r($status);

}
else if($userPassword == $datapassword && $useremmail != $dataemail || $userPassword != $datapassword && $useremmail == $dataemail || $userPassword != $datapassword && $dataemail != $useremmail)
{
    echo "there and issue with email and/or password";
    $status =  -1 ;
    die();

}


}

function signup($email,$password, $firstname, $lastname){
	require(__DIR__.'/lib_db.php');
	// Check if they already have an account
	$query=$pdo->prepare('SELECT ID, email, password, firstname, lastname FROM users WHERE email=?');
	$query->execute([$email]);
	if($query->rowCount()>0){
      $status = 0;

		echo $status;
		return;
	}

	//Add the user to the database
	$query=$pdo->prepare('INSERT INTO users(email,password, firstname, lastname) VALUES(?,?,?,?)');
	$query->execute([$email, $password, $firstname, $lastname]);
	//echo 'Your account has been created. Please, sign in.';
	//Show a message
    $status = 1;
    echo $status;
}

?> 

