<? php
require(__DIR__.'/lib_db.php');
require(__DIR__.'/lib_session.php');
header('Content-type: application/json');


if(count($_DELETE)> 0)
{
   

	$stmt = $pdo->prepare('SELECT * FROM items WHERE items.ID=?');
	$stmt->execute([$_GET['itemID']]);
	$post=$stmt->fetch();

	
	if(!isset($_SESSION['user/ID']) || $post['user_ID']!=$_SESSION['user/ID']) die(json_encode(['status'=>-1,'message'=>'You don\'t have the rights for this action']));
	$stmt = $pdo->prepare('DELETE FROM items WHERE itemID=?');
	$stmt->execute([$_GET['itemID']]);
	// die(json_encode(['status'=>1,'message'=>'The post has been deleted']));
	header('location:private.html');
}
?>