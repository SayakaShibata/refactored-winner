<?php
session_start();
if (!isset($_COOKIE['manageid'])) {
    header("Location: managelogin.php");
    exit;
}
require('db.php');

if(isset($_GET['f'])){
	if($_GET['f']=='add') dbCreate();
	if($_GET['f']=='list') dbRead();
	if($_GET['f']=='change') dbChange();
	if($_GET['f']=='remove') dbDelete();
}

function dbCreate(){
global $conn;
$userid = $_POST['userid'];
$password = $_POST['password'];
$name = $_POST['name'];
$profession = $_POST['profession'];
$phone = $_POST['phone'];
$email = $_POST['email'];

echo $name;

$target_dir = "img/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
 
 move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file);
 echo "Uploaded<br>filename ; " .$_FILES["fileToUpload"]["tmp_name"].'<br>';
$defImage = 'user.jpg';

if($_FILES["fileToUpload"]["name"]){
$sql = "INSERT INTO `users` (`id`, `userid`, `password`, `image`, `phone`, `email`, `profession`, `name`) VALUES (NULL,'".$userid."',MD5('".$password."'),'".$_FILES["fileToUpload"]["name"]."','".$phone."','".$email."','".$profession."','".$name."');";
$r = mysqli_query($conn,$sql);
}else{
$sql = "INSERT INTO `users` (`id`, `userid`, `password`, `image`, `phone`, `email`, `profession`, `name`) VALUES (NULL,'".$userid."',MD5('".$password."'),'".$defImage."''".$phone."','".$email."','".$profession."','".$name."');";
$r = mysqli_query($conn,$sql);	
}
echo $sql;
}

function dbRead(){
global $conn;
$sql = "SELECT * FROM `users`";
$r = mysqli_query($conn,$sql);
if(mysqli_num_rows($r)>0){
  echo '[';
  $Arr=[];
  while ($row = mysqli_fetch_assoc($r)) {
    //echo '$r';
    $rArr[] = '{"id":"'.$row['id'].'","userid":"'.$row['userid'].'","password":"'.$row['password'].'","name":"'.$row['name'].'","profession":"'.$row['profession'].'","phone":"'.$row['phone'].'","email":"'.$row['email'].'","image":"'.$row['image'].'"}';
  }
  echo implode(',', $rArr);
  echo ']';
}
}


function dbChange(){
global $conn;
$id = $_POST['id'];
$userid = $_POST['userid'];
$password = $_POST['password'];
$name = $_POST['name'];
$profession = $_POST['profession'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$target_dir = "img/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
 
 move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file);
 echo "Uploaded<br>filename ; " .$_FILES["fileToUpload"]["tmp_name"].'<br>';

$sql = "UPDATE `users` SET `userid` = '".$userid."', `password` =  MD5('".$password."'), `image` = '".$_FILES["fileToUpload"]["name"]."', `phone` = '".$phone."', `email` = '".$email."', `profession` = '".$profession."', `name` = '".$name."' WHERE `users` . `id` = ".$id.";";
$r = mysqli_query($conn,$sql);
}

function dbDelete(){
global $conn;
$id = $_POST['id'];
$sql = "DELETE FROM `users` WHERE `users`.`id` = ".$id.";";
$r = mysqli_query($conn,$sql);

}





?>