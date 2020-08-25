 <?php
setcookie('userid', '', time() - (86400 * 30), "/");
require('db.php');
$errorMessage = "";
if (isset($_POST["login"])) {
    if(empty($_POST["userid"])) {
        $errorMessage = 'User ID is blank';
    }else if(empty($_POST["password"])) {
        $errorMessage = 'Password is blank';
    }else{

    $userid=$_POST['userid'];
    $password=$_POST['password'];
		if(isset($userid)&&isset($password)){
		$sql = "SELECT * FROM `users` WHERE `userid` = '".$userid."' AND `password` = MD5('".$password."') LIMIT 1";
		$result = $conn->query($sql);
			if($result->num_rows>0){
				while($row = $result->fetch_assoc()) {
				$userid = $row['userid'];
				$username = $row['name'];
				$userphoto = $row['image'];
				$userprofession = $row['profession'];
				$userphone = $row['phone'];
				$useremail = $row['email'];
				setcookie('userid',$userid, time() + (86400 * 30), "/");
				setcookie('username',$username, time() + (86400 * 30), "/");
				setcookie('userphoto',$userphoto, time() + (86400 * 30), "/");
				}
			header("Location: home.php");
			}else{
			$errorMessage = 'Wrong your account';
			}
		}
	}
}
  ?>
<!Doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="shortcut icon" sizes="192x192" href="img/Nice-highres.png">
    <link rel="apple-touch-icon" href="img/Nice-highres.png">
 
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootswatch/4.5.0/litera/bootstrap.min.css" integrity="sha384-Gr51humlTz50RfCwdBYgT+XvbSZqkm8Loa5nWlNrvUqCinoe6C6WUZKHS2WIRx5o" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>Login</title>
  <?php require('db.php'); ?>
  </head>
  <body id="body">
  <!-- headder navi -->  
     <header></header>  
      <div class="container-fluid ">
      <div class="row"> 
<!-- main contents -->         
        <div class="col-md-4 offset-md-4 my-5">            
          <h2 class="text-center login">Login</h2>
          <div class="logos"><i class="fa fa-database"></i></div>
          <p class="login">this is your Login account<br><br><?php echo htmlspecialchars($errorMessage, ENT_QUOTES); ?></p>         
	        <form action="" method="post" id="login" class="bg-light px-3">
	          <input type="text" name="userid" class="my-4" placeholder="User ID"><br>
	          <input type="password" name="password" placeholder="password"><br>
	          <input type="submit" name="login" class="btn btn-info my-4">
      		</form>
        </div>
<?php require('footer.php'); ?>