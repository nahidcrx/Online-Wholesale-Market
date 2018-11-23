
<script>


  function validation() 
		{
			
			flag=true;
			var fn=document.adminloginform.uname.value.length;
			var ln=document.adminloginform.pass.value.length;

			
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
	getAdminDataFromDB("Select username,pass_word from adminlogin ");
	
	
	$u=$_REQUEST['uname'];
	$p=$_REQUEST['pass'];
	
	



	if(isset($auth[$u]) && $auth[$u]==$p){
		
		$_SESSION["user"]=$u;
		setcookie("access","00000",time()+5000);
		header("Location:admin.php?");
	}
	else{
		header("Location:adminlogin.php?error=Invalid Username/Password");
	}
}
}

?>



<link rel="stylesheet" type="text/css" href="login.css">

<form id="loginform" name="adminloginform" method="post" action="">
     <input type="text" class="input" name="uname" onkeyup="validation()" placeholder="Username" /> 
	 <span id="msg1" ></span>
     <input type="password" class="input" name="pass" onkeyup="validation()" placeholder="Password" />
	 <span id="msg2" ></span>
     <input type="submit" class="loginbutton" onkeyup="return validation()" value="Login" />
	 
	 <?php
	 
	     if(isset($error['username1'])){
		   echo $error['username1'];
		} 
		
		else if(isset($error['password1'])){
			 echo $error['password1'];
		}
	 
	 ?>
	 
	 

<a href=""></br></a>
<a href="login.php"></br>User Login</a>

</form>


<?php

        if(isset($_GET["error"])){
             echo "<span style='color:red;'>".$_GET["error"]."</span>";
        }     
?>