<?php
session_start();
if (!isset($_COOKIE['userid'])) {
    header("Location: index.php");
    exit;
}
if(isset($_COOKIE["manageid"])) setcookie("manageid", "", time() - 30);
?>
<?php require('header.php'); ?>
<!-- sideber navi -->
<?php require('sideber.php'); ?>
<!-- main contents -->           
    <main role="main" class="col-md-9 ml-md-auto col-lg-10 px-md-4">
      	<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">     
      		<h2 class="text-center" style="color: #fff;"><?php echo($_COOKIE['username']); ?> dashboard</h2>			
        </div>
        <div class="input-group mb-3">
        <input class="form-control" type="text" id="autosuggetion" onkeyup="showSuggestions()" placeholder="key word" autocomplete="off">
        <div class="input-group-append"><button class="btn btn-info" onclick="go()">Go</button></div>
        </div>
        <div id="suggestions">
        	<ul>
        	</ul>
        </div>
<script>
//	var symArray=[];
	function showSuggestions(){
		console.log(symArray)
		document.querySelector('#suggestions').style.display='block';
		var html='';
		var s = document.querySelector('#autosuggetion').value;
		var array2 =[];
		for(var i=0; i<symArray.length; i++){
			var regex = new RegExp(s,"i");
			if(symArray[i].search(regex)>=0){
				array2.push('<li onclick="s('+i+')" id="s'+i+'">'+symArray[i]+'</li>');
			}
		}
		for(var i=0; i<array2.length; i++){
			html+=array2[i];
		}

        document.querySelector('#suggestions ul').innerHTML=html;
	}

	function s(n){
		document.querySelector('#autosuggetion').value=document.querySelector('#s'+n).innerText;
		document.querySelector('#suggestions').style.display='none';
	}
	function go(){
		var s = document.querySelector('#autosuggetion').value;
		window.location.href='app.php?sym='+s;
	}


</script>




    </main>
<?php require('footer.php'); ?>