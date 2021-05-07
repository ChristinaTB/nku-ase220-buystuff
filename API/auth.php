<?php
require(__DIR__.'/lib_session.php');
require(__DIR__.'/lib_db.php');
// header('Content-type: application/json');
// $_SESSION['user/ID']= "";


if(isset($_GET['action']) && $_GET['action']=='signout' && isset($_SESSION['user/ID'])){

    $status =  -1 ;
    if ($status == -1 )
    {
        session_destroy(); 
       
     
         	
           

             header('location:../index.html') ;
              return;
                
    }

//    
	// die(json_encode(['status'=>1,'message'=>'You have been signed out']));
    // header('location: ../index.html') ;
    
}

// if(isset($_SESSION['user/ID'])) die(json_encode(['status'=>-1,'message'=>'The user is already logged.'])); 

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
   
 
//   print_r($no . " ");
  
// print_r($user);

$userPassword = $_POST['password'];
$datapassword = $user['password'];
$useremmail = $_POST['email'];
$dataemail = $user['email'];
$userIDs = $user['ID'];
$useradmin= $user['is_admin'];

    // print_r($userPassword);
    // print_r($user['email']);
    // print_r($password);
    // json_encode($no);
    // var_dump($no);

// password_verify($userPassword, $datapassword)
// {
//     echo "it worked";
// }

if($userPassword == $datapassword && $useremmail == $dataemail)
{
    //when the passwoord and email matches
    // echo 'finally';
    // $response= array(
    //     'status' =>1 
    // );


    $status =  1 ;
    $_SESSION['user/ID']=$userIDs;
	$_SESSION['user/is_admin']= $useradmin;

    print_r($status);
    // print_r($firstsession = $_SESSION['user/ID']);


    // print_r($firstsession);
    
    // print_r($response);
    //  die(json_encode([ $response, 'message'=>'Welcome to our website']));
    
    ; 


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
		echo 'The user already exists. Please, sign in.';
		return;
	}


    // $signup_userPassword = $_GET['password'];
    // // $datapassword = $user['password'];
    // $signup_useremmail = $_GET['email'];
    // $signup_firstname = $_GET['firstname'];
    // $signup_lastname = $_GET['lastname'];
    // $dataemail = $user['email'];
    // $userIDs = $user['ID'];
    // $useradmin= $user['is_admin'];
    


	//Add the user to the database
	$query=$pdo->prepare('INSERT INTO users(email,password, firstname, lastname) VALUES(?,?,?,?)');
	$query->execute([$email, $password, $firstname, $lastname]);
	echo 'Your account has been created. Please, sign in.';
	//Show a message
}




// function signin($email,$password){
// 	require(__DIR__.'/lib_db.php');
// 	// Check if the user is in the database
// 	$query=$pdo->prepare('SELECT ID,password,is_admin, email FROM users WHERE email=?');
// 	$query->execute([$email]);
// 	if($query->rowCount()==0){
// 		die(json_encode(['status'=>-1,'message'=>'The user does not exist. Please, sign up.']));
// 	}
// 	//Check whether the password is correct
// 	$user=$query->fetch();
// 	if(password_verify($password,$user['password'])){
// 		$_SESSION['user/ID']=$user['ID'];
// 		$_SESSION['user/is_admin']=$user['is_admin'];
// 		die(json_encode(['status'=>1,'message'=>'Welcome to our website']));
// 	}else{
// 		die(json_encode(['status'=>-1,'message'=>'The email or password are incorrect']));
// 	}
// print_r($email);
// print_r($password);
// print_r($user['password']);






?> 

