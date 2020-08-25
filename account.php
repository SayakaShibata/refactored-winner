<?php
session_start();
if (!isset($_COOKIE['userid'])) {
    header("Location: index.php");
    exit;
}
$header ='';
if(isset($_GET['u'])){
	$header = strtoupper($_GET['u']);
}
?>
<?php require('header.php'); ?>
<!-- sideber navi -->
<?php require('sideber.php'); ?>
<!-- main contents -->           
    <main role="main" class="col-md-9 ml-md-auto col-lg-10 px-md-4">
      	<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
      			<h2 class="text-center" style="color: #fff;"><?php echo $header; ?> dashboard</h2>

<?php
switch ($header){
    case 'TASKS':
?>
about task page

<?php 
    break;
    case 'CHAT'; 
?>

about chat page

<?php 
    break;
    case 'ANALISE'; 
?>
about analise page

<?php 
    break;
    default:
?>
	about default page

<?php 
    break;
}
?>


</div>

        </div>
    </main>
<?php require('footer.php'); ?>