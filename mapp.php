<?php
session_start();
if (!isset($_COOKIE['manageid'])) {
    header("Location: managelogin.php");
    exit;
}
?>
<?php require('header.php'); ?>
<!-- sideber navi -->
<?php require('sideber.php'); ?>
<!-- main contents -->           
    <main role="main" class="col-md-9 ml-md-auto col-lg-10 px-md-4">
      	<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
         	<h2 class="text-center" style="color: #fff;">User manegement</h2>
         </div>
         	<button type="button" class="btn btn-warning my-2" data-toggle="modal" data-target="#staticBackdrop">New user registration</button>
         	<div id="useroutput"></div>
			


<!-- Add Modal -->
<div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">New user registration</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form>
        	<img id="output_imaget"/><br>
      		<input id="image" type="file" accept="img/*" onchange="preview_image(event)" class="">
        <input class="form-control" type="text" id="userid" placeholder="* New user's ID">
        <input class="form-control my-1" type="text" id="password" placeholder="* password">
        <input class="form-control" type="text" id="name" placeholder="Full name">
        <input class="form-control my-1" type="text" id="profession" placeholder="Profession">
        <input class="form-control" type="text" id="phone" placeholder="Phone number">
        <input class="form-control my-1" type="text" id="email" placeholder="e-mail address">
      </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button class="btn btn-warning" onclick="addName()" data-dismiss="modal">Registration</button>
      </div>
    </div>
  </div>
</div>

<!-- change Modal -->
<div class="modal fade" id="Modal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Change user informatione</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
            <div class="form-group mb-2">
            	<div id="chChange" class="modal-photo"></div>
                <p class="upgroup"><input type="hidden" id="idChange" class="form-control update" placeholder="ID"></p>
                UserID<p class="upgroup"><input type="text" id="useridChange" class="form-control my-1 update" placeholder="userid"></p>
                Password<p class="upgroup"><input type="text" id="passwordChange" class="form-control update" placeholder="Password"></p>
                Name<p class="upgroup"><input type="text" id="nameChange" class="form-control my-1 update" placeholder="add name"></p>
                Profession<p class="upgroup"><input type="text" id="professionChange" class="form-control update" placeholder="add Profession"></p>
                Phone<p class="upgroup"><input type="text" id="phoneChange" class="form-control my-1 update" placeholder="add phone"></p>
                Email<p class="upgroup"><input type="text" id="emailChange" class="form-control update" placeholder="add Email"></p>
            </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button class="btn btn-warning js-modal-close" onclick="changeName()" data-dismiss="modal">Save change</button>
      </div>
    </div>
  </div>
</div>

<!--Delete Name -->
<div class="modal fade" id="modal2" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content alert-danger">
      <div class="modal-header">
        <h5 class="modal-title" id="modal2Label">Alert!</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
              <div class="form-group mb-2">
          <input type="hidden" id="idDelete" class="form-control" placeholder="ID">
          <p>if you remove this member, you cannot return !</p>
              </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cansel</button>
        <button class="btn btn-warning mb-2" onclick="delName()" data-dismiss="modal">OK Remove</button>
      </div>
    </div>
  </div>
</div>

<!-- End Modal -->
        </div>
    </main>
<script>
    function ch(id,userid,password,name,profession,phone,email,image){
      document.getElementById('idChange').value = id;
      document.getElementById('useridChange').value = userid;
      document.getElementById('passwordChange').value = password;
      document.getElementById('nameChange').value = name;
      document.getElementById('professionChange').value = profession;
      document.getElementById('phoneChange').value = phone;
      document.getElementById('emailChange').value = email;
      document.getElementById('chChange').innerHTML = '<img src="img/'+image+'" class="mordai-cicle" id="change_imaget"><br><input id="imageChange" type="file" accept="img/*" onchange="preview_chimage(event)" class="">';
  	}

    function del(id){
      document.getElementById('idDelete').value = id;
    }

function list(){
	var xhttp3 = new XMLHttpRequest();
    xhttp3.onreadystatechange = function(){
      if (this.readyState == 4 && this.status == 200){
        var u = JSON.parse(xhttp3.responseText);
        console.log(u[0].name);
        h='';
        for(var i=0; i<u.length; i++){
        h+='<table style="width:100%; background-color: #fff; font-size: 14px; margin-bottom:1px;"><tbody><tr><td rowspan="5" style="width:110px;"><img src="img/'+u[i].image+'" style="width: 100px; height: 100px;"></td><td style="width:100px;">UserID</td><td>'+u[i].userid+'</td><td></td></tr><tr><td>Name</td><td>'+u[i].name+'</td><td rowspan="2" style="width:70px;"><button onclick="ch('+u[i].id+',\''+u[i].userid+'\',\''+u[i].password+'\',\''+u[i].name+'\',\''+u[i].profession+'\',\''+u[i].phone+'\',\''+u[i].email+'\',\''+u[i].image+'\')" class="btn btn-outline-warning btn-sm my-1 py-2" data-toggle="modal" data-target="#Modal1">Change</button></td></tr><tr><td>Profession</td><td>'+u[i].profession+'</td></tr><tr><td>Email</td><td>'+u[i].email+'</td><td rowspan="2"><button onclick="del('+u[i].id+')" class="btn btn-outline-secondary btn-sm my-1 py-2" data-toggle="modal" data-target="#modal2">&nbsp;Delete&nbsp;</button></td></tr><tr><td>Phone</td><td>'+u[i].phone+'</td></tr></tbody></table>';
        	}
        console.log(h);
       	document.getElementById("useroutput").innerHTML = h;
        }
    };
    xhttp3.open("GET","function.php?f=list",true);
    xhttp3.send();
    }
   list();

    function addName(){
      if(document.getElementById('userid').value!=''){
        var formData = new FormData();      
        formData.append("userid", document.getElementById('userid').value);
        formData.append("password", document.getElementById('password').value);
        formData.append("name", document.getElementById('name').value);
        formData.append("profession", document.getElementById('profession').value);
        formData.append("phone", document.getElementById('phone').value);
        formData.append("email", document.getElementById('email').value);
      	formData.append("fileToUpload", document.getElementById('image').files[0]);
//         console.log(formData);
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function(){
          if (this.readyState == 4 && this.status == 200){
            console.log('Added');
            document.getElementById('userid').value='';
            document.getElementById('password').value='';
            document.getElementById('name').value='';
            document.getElementById('profession').value='';
            document.getElementById('phone').value='';
            document.getElementById('email').value='';
            document.getElementById('image').files[1]='';
            document.getElementById('output_imaget').setAttribute('src','');
            document.getElementById('image').value='';       
            list();
            }
        };
        xhttp.open("POST","function.php?f=add",true);
        xhttp.send(formData);
      }else{
          console.log('name field is blank');
      }
    }


    function changeName(){
      if(document.getElementById('useridChange').value!=''){      
        var formData = new FormData();
        formData.append("id", document.getElementById('idChange').value);
        formData.append("userid", document.getElementById('useridChange').value);
        formData.append("password", document.getElementById('passwordChange').value);
        formData.append("name", document.getElementById('nameChange').value);
        formData.append("profession", document.getElementById('professionChange').value);
        formData.append("phone", document.getElementById('phoneChange').value);
        formData.append("email", document.getElementById('emailChange').value);
       	formData.append("fileToUpload", document.getElementById('imageChange').files[0]);       
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function(){
          if (this.readyState == 4 && this.status == 200){
            console.log('changed:'+document.getElementById('idChange').value);
            document.getElementById('idChange').value='';
            document.getElementById('useridChange').value='';
            document.getElementById('passwordChange').value='';
            document.getElementById('nameChange').value='';
            document.getElementById('professionChange').value='';
            document.getElementById('phoneChange').value='';
            document.getElementById('emailChange').value='';
            document.getElementById('imageChange').files[0]='';
            document.getElementById('change_imaget').setAttribute('src','');
            document.getElementById('image').value=''; 
            list();
          }
      };
      xhttp.open("POST","function.php?f=change", true);
      xhttp.send(formData);
      }else{
          console.log('name field is blank');
      }
    }

    function delName(){
      var formData = new FormData();
      formData.append("id", document.getElementById('idDelete').value);
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function(){
          if (this.readyState == 4 && this.status == 200){
            console.log('deleat:'+document.getElementById('idDelete').value);
            document.getElementById('idDelete').value='';
            list();
          }
      };
      xhttp.open("POST", "function.php?f=remove" , true);
      xhttp.send(formData);
    }

    list();

    function preview_image(event){
     var reader = new FileReader();
     reader.onload = function(){
      var output = document.getElementById('output_imaget');
      output.src = reader.result;
     }
     reader.readAsDataURL(event.target.files[0]);
     document.getElementById('output_imaget').setAttribute('src','');
    }

    function preview_chimage(event){
     var reader = new FileReader();
     reader.onload = function(){
      var output = document.getElementById('change_imaget');
      output.src = reader.result;
     }
     reader.readAsDataURL(event.target.files[0]);
     document.getElementById('change_imaget').setAttribute('src','');
    }


</script>
<script>
  var input = document.getElementById('body');
  input.style.background = 'rgb(6,0,102)';
  input.style.background = 'linear-gradient(35deg, rgba(6,0,102,1) 0%, rgba(35,35,170,1) 25%, rgba(0,212,255,1) 93%)';
</script>
<?php require('footer.php'); ?>