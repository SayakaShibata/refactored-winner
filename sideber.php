<?php if(isset($_COOKIE['userid'])){ ?>
  <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block sidebar collapse">
    <div class="sidebar-sticky pt-3">
      <div class="userphoto"><img src="img/<?php echo($_COOKIE['userphoto']); ?>"></div>
        <ul class="nav nav-pills flex-column">
            <li class="nav-item"><a href="home.php"><i class="fa fa-home"></i> <span>Home</span></a></li>
            <li class="nav-item"><a href="account.php?u=tasks"><i class="fa fa-home"></i> <span>Tasks</span></a></li>
            <li class="nav-item"><a href="account.php?u=chat"><i class="fa fa-home"></i> <span>Chat</span></a></li>
            <li class="nav-item"><a href="account.php?u=analise"><i class="fa fa-home"></i> <span>Analitics</span></a></li>
            <li class="nav-item"><span>Activ Reports</span></li>
<?php } ?>
<?php if(isset($_COOKIE['manageid'])){ ?>
  <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block sidebar collapse">
    <div class="sidebar-sticky pt-3">
      <div class="userphoto"><img src="img/user.jpg"></div>
        <ul class="nav nav-pills flex-column">
            <li class="nav-item"><a href="manage.php"><i class="fa fa-home"></i> <span>Home</span></a></li>
            <li class="nav-item"><a href="mapp.php"><i class="fa fa-user"></i> <span>User manage</span></a></li>
            <li class="nav-item"><a href="manages.php?mng=tasks"><i class="fa fa-tasks"></i> <span>tasks</span></a></li>
            <li class="nav-item"><a href="manages.php?mng=chat"><i class="fa fa-comment"></i> <span>chat</span></a></li>
            <li class="nav-item"><span>Activ Reports</span></li>
<?php } ?>
              <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-bitcoin"></i>Virtual Currency</a>
              <div id="output2" class="dropdown-menu" style="">
              </div>
            </li>
              <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-bitcoin"></i>Exchange Rate</a>
              <div id="" class="dropdown-menu" style="">
              </div>
            </li>
          </ul>

     <script>
          var symArray = [];
          var xhttp2 = new XMLHttpRequest();
          xhttp2.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
              var t = JSON.parse(xhttp2.responseText);
              var h = '';
               for(var i=0; i<t.length; i++){
                symArray.push(t[i].id);
              }
                symArray = symArray.sort();
               for(var i=0; i<symArray.length; i++){
                h += '<a class="dropdown-item" href="app.php?sym='+symArray[i]+'"><span>'+symArray[i]+'</span></a>';
              }

              document.getElementById("output2").innerHTML=h;
            }
          };
          //xhttp.setRequestHeader("Origin", 'api.exchange.bitcoin.com');
          xhttp2.open("GET", "https://thingproxy.freeboard.io/fetch/https://api.exchange.bitcoin.com/api/2/public/currency", true);
          xhttp2.send();
    </script>
    </div>
  </nav>