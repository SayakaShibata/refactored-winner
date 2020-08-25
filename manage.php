<?php
session_start();
if (!isset($_COOKIE['manageid'])) {
    header("Location: managelogin.php");
    exit;
}
if(isset($_COOKIE["userid"])) setcookie("userid", "", time() - 30);
?>
<?php require('header.php'); ?>
<!-- sideber navi -->
<?php require('sideber.php'); ?>
<!-- main contents -->           
    <main role="main" class="col-md-9 ml-md-auto col-lg-10 px-md-4">
      	<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">     
      		<h2 class="text-center" style="color: #fff;"><?php echo($_COOKIE['managename']); ?> dashboard</h2>
			
        </div>
    </main>
<script>
	var input = document.getElementById('body');
  input.style.background = 'rgb(6,0,102)';
	input.style.background = 'linear-gradient(35deg, rgba(6,0,102,1) 0%, rgba(35,35,170,1) 25%, rgba(0,212,255,1) 93%)';
</script>
<?php require('footer.php'); ?>