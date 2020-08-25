<?php
session_start();
if (isset($_COOKIE['userid']) or isset($_COOKIE['manageid'])) {
}else{
	header("Location: index.php");
    exit;
}
?>
<?php require('header.php'); ?>
<?php require('sideber.php'); ?>

<?php
$header ='Homepage';
if(isset($_GET['sym'])){
	$header = strtoupper($_GET['sym']);
}

?>
<!-- main contents -->
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2"><?php echo $header ?></h1>
        <div class="btn-toolbar mb-2 mb-md-0">
          <div class="btn-group mr-2">
            <button type="button" class="btn btn-sm btn-info">Share</button>
            <button type="button" class="btn btn-sm btn-info">Export</button>
          </div>
          <button type="button" class="btn btn-sm btn-info dropdown-toggle">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-calendar"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg>
            This week
          </button>
        </div>
      </div>
      	<h3>todays graphs</h3>   
          <canvas id="myChart" width="100%" height="60"></canvas>
          <br>
        <h3>Data detail last 100</h3>
          <div id="output"></div>

<?php if($header!='Homepage'){ ?>
          <script>
			var xhttp = new XMLHttpRequest();
			xhttp.onreadystatechange = function() {
			  if (this.readyState == 4 && this.status == 200) {
			    var t = JSON.parse(xhttp.responseText);
			    var h = '';
			    var labelArray =[];
			    var dataArray=[];
			    var months = ["Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec"]
			   // console.log(t.BTCUSD[0]);
			   h+='<table class="table"><thead><tr><th scope="row">#</th><th>price</th><th>time</th></tr></thead><tbody>';
				   for(var i=0; i<t.<?php echo $header ?>USD.length; i++){
				    var price = t.<?php echo $header ?>USD[i].price;
				    var time = new Date(t.<?php echo $header ?>USD[i].timestamp);
				    var time2 = months[time.getMonth()]+' '+time.getDate()+', '+time.getFullYear();
				    labelArray.push(time.getHours()+":"+time.getMinutes()+":"+time.getSeconds());
				    dataArray.push(t.<?php echo $header ?>USD[i].price);
				    h+='<tr><th scope="row">'+[i]+'</th><td>'+price+'</td><td>'+time+'</td></tr>';
					}
				h+='</tbody></table>';
			  	document.getElementById("output").innerHTML=h;
			  	labelArray=labelArray.reverse();
			  	dataArray=dataArray.reverse();
				var ctx = document.getElementById('myChart').getContext('2d');
				var chart = new Chart(ctx, {
				    type: 'line',
				    data: {
				        labels: labelArray,
				        datasets: [{
				            label: '<?php echo $header ?> price',
				            backgroundColor: 'rgb(255, 99, 132)',
				            borderColor: 'rgb(255, 99, 132)',
				            data: dataArray
				        }]
				    },
				    options: {}
				});

			  }
			};
			//xhttp.setRequestHeader("Origin", 'api.exchange.bitcoin.com');
			xhttp.open("GET", "https://thingproxy.freeboard.io/fetch/https://api.exchange.bitcoin.com/api/2/public/trades/?limit=100&symbols=<?php echo strtolower($header) ?>usd", true);
			xhttp.send();



          </script>
<?php
}
?>
        </div>
</main>
<?php require('footer.php'); ?>