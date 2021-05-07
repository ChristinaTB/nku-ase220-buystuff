<?php
require(__DIR__.'/lib_db.php');
require(__DIR__.'/lib_session.php');
header('Content-type: application/json');


switch($_POST['action']){
	case 'GET':
		if(isset($_GET['itemID'])) detail($pdo);
		else index($pdo);
		break;
	case 'POST': 
		create($pdo);
		break;
	case 'PUT':
		parse_str(file_get_contents(__DIR__."/item_detail.php"),$_PUT);
		edit($pdo,$_PUT);
		break;
	case 'DELETE':
		parse_str(file_get_contents("php://input"),$_DELETE);
		delete($pdo,$_DELETE['itemID']);
		break;
}


function index($pdo){
	$stmt=$pdo->prepare('SELECT * FROM items');
	$stmt->execute([]);
	die(json_encode($stmt->fetchAll()));
}

function detail($pdo){
	$stmt = $pdo->prepare('SELECT ID, item_name, item_price, item_detail, item_picture, user_ID FROM items WHERE items.ID=?');
	$stmt->execute([$_GET['itemID']]);
	$post=$stmt->fetch();
	if(isset($_SESSION['user/ID']) && ($post['user_ID']==$_SESSION['user/ID'] || $_SESSION['user/is_admin']==1)) $post['manage']=1;
	else $post['manage']=0;
	die(json_encode($post));
}

function create($pdo){
	if(!isset($_SESSION['user/ID'])) die(json_encode(['status'=>-1,'message'=>'This page is for registered users only. Please <a href="auth.php">Sign in</a>.']));
	if(count($_POST)>0){
		$stmt = $pdo->prepare('INSERT INTO items (item_name, item_price, item_detail, item_picture, user_ID) VALUES (?,?,?,?,?)');
		$stmt->execute([$_POST['item_name'],$_POST['item_price'], $_POST['item_detail'],$_POST['item_picture'],$_SESSION['user/ID']]);
		die(json_encode(['status'=>1,'message'=>'The message has been saved.']));
	}
}

function edit($pdo,$_PUT){
	if(count($_POST)>0){
    
		$stmt = $pdo->prepare('UPDATE items SET item_name = ?, item_price = ?, item_detail = ?, item_picture = ?, user_ID =? WHERE itemID =?');
		$stmt->execute([$_PUT['item_name'],$_PUT['item_price'],$_PUT['item_detail'],$_PUT['item_picture'],$_PUT['user_ID'],$_PUT['ID']]);
		die(json_encode(['status'=>-1,'message'=>'Your data have been saved']));
	}
	die(json_encode(['status'=>-1,'message'=>'Your data were not saved']));
}

function delete($pdo,$id){
	$stmt = $pdo->prepare('SELECT * FROM items WHERE ID=?');
	$stmt->execute([$id]);
	$post=$stmt->fetch();
	if(!isset($_SESSION['user/ID']) || $post['user_ID']!=$_SESSION['user/ID']) die(json_encode(['status'=>-1,'message'=>'You don\'t have the rights for this action']));
	$stmt = $pdo->prepare('DELETE FROM items WHERE ID=?');
	$stmt->execute([$id]);
	die(json_encode(['status'=>1,'message'=>'The post has been deleted']));
}