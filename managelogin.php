 <?php
setcookie('manageid', '', time() - (86400 * 30), "/");
require('db.php');
$errorMessage = "";
if (isset($_POST["managerlogin"])) {
    if(empty($_POST["managerid"])) {
        $errorMessage = 'manager ID is blank';
    }else if(empty($_POST["managerpass"])) {
        $errorMessage = 'Password is blank';
    }else{
    $managerid=$_POST['managerid'];
    $managerpass=$_POST['managerpass'];
		if(isset($managerid)&&isset($managerpass)){
		$sql = "SELECT * FROM `managers` WHERE `manager` = '".$managerid."' AND `password` = MD5('".$managerpass."') LIMIT 1";
		$result = $conn->query($sql);
			if($result->num_rows>0){
				while($row = $result->fetch_assoc()) {
				$manageid = $row['id'];
				$managename = $row['manager'];
				$parmission = $row['parmission'];
				setcookie('manageid',$manageid, time() + (86400 * 30), "/");
				setcookie('managename',$managename, time() + (86400 * 30), "/");
				setcookie('parmission',$managephoto, time() + (86400 * 30), "/");
				}
			header("Location: manage.php");
			}else{
			$errorMessage = 'Wrong your manager account';
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
    <title>Manager Login</title>
  </head>
  <body id="body">
  <!-- headder navi -->  
     <header></header>  
      <div class="container-fluid ">
      <div class="row"> 
<!-- main contents -->         
        <div class="col-md-4 offset-md-4 my-5">            
          <h2 class="text-center login">Manager Login</h2>
          <div class="logos"><i class="fa fa-tasks"></i></div>
          <p class="login">this is your manegiment account<br><br>
            <?php echo htmlspecialchars($errorMessage, ENT_QUOTES); ?></p>         
	        <form action="" method="post" id="managerlogin" class="bg-light px-3">
	          <input type="text" name="managerid" class="my-4" placeholder="manager ID"><br>
	          <input type="password" name="managerpass" placeholder="password"><br>
	          <input type="submit" name="managerlogin" class="btn btn-info my-4">
      		</form>
            <p class="login"><br><a href="index.php">user login</a><br></p>

        </div>
<script>
  var input = document.getElementById('body');
  input.style.background = 'rgb(6,0,102)';
  input.style.background = 'linear-gradient(35deg, rgba(6,0,102,1) 0%, rgba(35,35,170,1) 25%, rgba(0,212,255,1) 93%)';
</script>
<?php require('footer.php'); ?>