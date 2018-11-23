
<?php



if(!isset($_COOKIE["access"])){
	
	header("Location:login.php?");
 
}

?>



<?php


session_start();

$u=$_SESSION["user"];

include("DB.php");

//echo($u);


?>

<script src="jquery-2.2.4.js"></script>
<script>
/*
$(document).ready(function(){

    $("#show").click(function(){
        $("#p").show();
    });
});
*/
</script>

<script>

function validation() 
	{
		var flag=true;
			var c=document.changepass.currentpass.value.length;
			var p=document.changepass.pass.value.length;
			var cp=document.changepass.cpass.value.length;
			
		document.getElementById("msg1").innerHTML="";
	   document.getElementById("msg2").innerHTML="";
	   document.getElementById("msg3").innerHTML="";
	   
	   
	   if(c==0){
		   
		   un=document.getElementById("msg1");
		   un.innerHTML="Enter Current Password";
		   flag=false;
	   }
	   else if(p==0){
		   
		   un=document.getElementById("msg2");
		   un.innerHTML="Enter New Pass";
		   flag=false;
	   }
	   else if(cp==0){
		   
		   un=document.getElementById("msg3");
		   un.innerHTML="Enter Password Again";
		   flag=false;
	   }
	   
	   else if(p != cp){
		   
		   un=document.getElementById("msg3");
		   un.innerHTML="Password Doesn't Match";
		   flag=false;
	   }
	   
	   return flag;
	   
	}


</script>

<script>


  function checkcurrentpass() 
		{
			//document.getElementById("spinner").style.visibility="visible";
			//var v=document.getElementById("email").value;
			//var v2=document.getElementById("username").value;
			var v=document.getElementById("currentpass").value;
			var  xmlhttp = new XMLHttpRequest();
			
			xmlhttp.onreadystatechange = function() 
				{
					if (xmlhttp.readyState == 4 && xmlhttp.status == 200) 
						{			
							var m=document.getElementById("cp");
							//m.innerHTML="Ok";
							m.innerHTML=xmlhttp.responseText;
							//document.getElementById("username").value="";
							//document.getElementById("spinner").style.visibility="hidden";
							//alert(xmlhttp.responseText);
						}
				}
			//var url="server.php?ist=ok&un="+v+"&cg="+v2;
			var url="rserver.php?pass="+v;
			//alert(url);
			xmlhttp.open("GET", url,true);
			xmlhttp.send();
		}

function showHint() 
		{
			//document.getElementById("spinner").style.visibility="visible";
			var v=document.getElementById("pname").value;
			//var v2=document.getElementById("mytext2").value;
			var  xmlhttp = new XMLHttpRequest();
			
			xmlhttp.onreadystatechange = function() 
				{
					if (xmlhttp.readyState == 4 && xmlhttp.status == 200) 
						{			
							var m=document.getElementById("txtHint");
							//m.innerHTML="Ok";
							m.innerHTML=xmlhttp.responseText;
							//document.getElementById("spinner").style.visibility="hidden";
							//alert(xmlhttp.responseText);
						}
				}
			//var url="server.php?ist=ok&un="+v+"&cg="+v2;
			var url="server.php?prname="+v;
			//alert(url);
			xmlhttp.open("GET", url,true);
			xmlhttp.send();
		}
</script>

<?php
 
		if($_POST){
	   
	   $errors=array();
	   
	    if(strlen($_POST['currentpass'])==0){
		 $errors['error1']="Enter Current Password";
		}
		
	    if(strlen($_POST['pass'])==0){
		 $errors['error2']="Enter New Password"; 
		}
		if(strlen($_POST['cpass'])==0){
		 $errors['error3']="Enter New Password Again"; 
		}	
		if($_POST["cpass"]!=$_POST["pass"] ){
		 $errors['error4']="Password Doesn't Match ";
		}
		
		if(count($errors)==0){
			$currentpass=$_POST["currentpass"];
			$npass=md5($_POST["pass"]);
			$ncpass=$_POST["cpass"];
			
			$all=array();
		     
			 
	        getAllDataFromDB("Select * from registrationtable where User_Name='$u'");
			
			$p=$all[0];
			
			if(md5($currentpass)!=$p["Pass"]){
				$errors['error5']="Current Password Doesn't Match ";
			}
			
			else{
			
			
			
			$x=updateSQL("UPDATE registrationtable set Pass='$npass' where User_Name='$u' ");
			
			echo "<script type='text/javascript'>alert('Password Successfully Changed!')</script>";
		 
		 
				echo " <script>window.location='profile.php';</script> ";
		}
		}
	}
	


?>



<link rel="stylesheet" type="text/css"  href="profile.css" >

<body class="main">

    <div class="navigation">
	<ul>
	     <li> <a href="menuuser.php" > Menu </a>
		    <!--ul>
			     <li> <a href="" > RICE </a> </li>
				 <li> <a href="" > FISH </a> </li>
				 <li> <a href="" > MEAT </a> </li>
				 <li> <a href="" > VEGETABLES  </a></li>
				 <li> <a href="" > MILK </a> </li>
			     <li> <a href="" > FRUITS </a> </li>
				  
			
			</ul-->
		 </li>
		
		  <li> <a href="user.php" > Home</a> </li>
		  <li> <a href="logout.php" > Logout</a> </li>
		  <li> <a href="profile.php" > Profile</a> </li>

		  
		  
	
	</ul>
	</div>
	
	 
	
	
	<div class="location">
	<ul>
		
		<li> <a href="" > Location </a> 
		<ul>
		     <li> <a href='userlocationresult.php?variable=Barisal' > Barisal </a> </li>
			 <li> <a href='userlocationresult.php?variable=Chittagong' > Chittagong </a> </li>
			 <li> <a href='userlocationresult.php?variable=Dhaka' > Dhaka </a> </li>
			 <li> <a href='userlocationresult.php?variable=Khulna' > Khulna </a> </li>
			 <li> <a href='userlocationresult.php?variable=Mymensingh' > Mymensingh </a> </li>
			 <li> <a href='userlocationresult.php?variable=Rangpur' > Rangpur </a> </li>
			 <li> <a href='userlocationresult.php?variable=Sylhet' > Sylhet </a> </li>
			 <li> <a href='userlocationresult.php?variable=Rajshahi' > Rajshahi </a> </li>
		   
		</ul>
		</li>
		
			 
		 
	</ul>
	</div>
	

	
	<div class="search">
		
		     <span><input type="text" name="search" id="pname" onkeyup="showHint()" placeholder="Search"></span>
		     <span><input type="submit" name="sbt1" id="srch" onclick="showHint()" value="Search"></span>
			 <span><p id="txtHint" style="border:0px solid red;"></p></span>
			 </br>
		
	</div>
	<br>	<br>
	<br>
	<br>
	<br>
	<br>
	<br>

	
	<?php
		
		
			
			/*echo "<pre>";
			
			print_r($all);
			
			
			echo "</pre>";*/
			


		
	?>
		
		<?php
		
			if(isset($errors['error1'])){
			   echo $errors['error1'];
			} 
			
			else if(isset($errors['error2'])){
				 echo $errors['error2'];
			}
			
			else if(isset($errors['error3'])){
				 echo $errors['error3'];
			}
			else if(isset($errors['error4'])){
				 echo $errors['error4'];
			}
			else if(isset($errors['error5'])){
				 echo $errors['error5'];
			}
			
			
		
	    ?>
		
		
	
		<form action="" name="changepass" method="post">
		
		<div id="p" style="">
		
		Enter Your Current Password:
		
		<input type="password"  name="currentpass" id="currentpass" onkeyup="validation()"" >
		<span id="msg1"></span>
		</br>
		</br>
		Enter New Password:
		<input type="password"  name="pass" onkeyup="validation()">
		<span id="msg2"></span>
		</br>
		</br>
		Confirm New Password:
		<input type="password"  name="cpass"onkeyup="validation()" >
		<span id="msg3"></span>
		</br>
		</br>
		<input id="show" type="submit" value="Confirm Change Password" onclick="return validation()" />
		</div>
		
		</form>
</body>