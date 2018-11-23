

<script>


  function validation() 
		{
			
			flag=true;
			var fn=document.loginform.uname.value.length;
			var ln=document.loginform.pass.value.length;

			
		document.getElementById("msg1").innerHTML="";
	   document.getElementById("msg2").innerHTML="";

	   
	   if(fn==0){
		   
		   un=document.getElementById("msg1");
		   un.innerHTML="User Name Empty";
		   flag=false;
	   }
	   else if(ln==0){
		   
		   un=document.getElementById("msg2");
		   un.innerHTML="Password Empty";
		   flag=false;
	   }

	     return flag;
	}

</script>


<?php
session_start();



if($_POST){
	

$error=array();

if(empty($_POST['uname'])){
 $error['username1']="Username Can Not Empty";
}

if(empty($_POST['pass'])){
 $error['password1']="Password Can Not Empty"; 
}


if(count($error)==0)
{

	$auth=array();
	include("DB.php");
	getDataFromDB("Select User_Name,Pass from registrationtable");
	
	
	$u=$_REQUEST['uname'];
	$p=md5($_REQUEST['pass']);



	if(isset($auth[$u]) && $auth[$u]==$p){
		
		
		setcookie("access","00000",time()+5000);
		
		$_SESSION["user"]=$u;
		header("Location:user.php?");
	}
	else{
		header("Location:login.php?error=Invalid Username/Password");
	}
}
}

?>



<link rel="stylesheet" type="text/css" href="login.css">

<form id="loginform" name="loginform" method="post" action="">
     <input type="text" class="input" name="uname" onkeyup="validation()" placeholder="Username" /> 
	 <span id="msg1" ></span>
     <input type="password" class="input" name="pass" onkeyup="validation()" placeholder="Password" />
	 <span id="msg2" ></span>
     <input type="submit" class="loginbutton" onclick="return validation()" value="Login" />
	 
	 <?php
	 
	     if(isset($error['username1'])){
		   echo $error['username1'];
		} 
		
		else if(isset($error['password1'])){
			 echo $error['password1'];
		}
	 
	 ?>
	 
	 

<a href="reg.php"></br>Click Here For New User</a>
<a href="adminlogin.php"></br>Admin Login</a>
<a href="home.php"></br>Home</a>

</form>


<?php

        if(isset($_GET["error"])){
             echo "<span style='color:red;'>".$_GET["error"]."</span>";
        }     
?>