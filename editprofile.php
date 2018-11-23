
<?php



if(!isset($_COOKIE["access"])){
	
	header("Location:login.php?");
 
}

?>

<?php


session_start();

$u=$_SESSION["user"];

require("DB.php");

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
			
			flag=true;
			var fn=document.profileedit.fname.value.length;
			var ln=document.profileedit.lname.value.length;
			var ph=document.profileedit.phone.value.length;
			var em=document.profileedit.mail.value.length;
			
		document.getElementById("msg1").innerHTML="";
	   document.getElementById("msg2").innerHTML="";
	   document.getElementById("msg3").innerHTML="";
	   document.getElementById("msg4").innerHTML="";
	   
	   if(fn==0){
		   
		   un=document.getElementById("msg1");
		   un.innerHTML="First Name Empty";
		   flag=false;
	   }
	   else if(ln==0){
		   
		   un=document.getElementById("msg2");
		   un.innerHTML="Last Name Empty";
		   flag=false;
	   }
	   else if(ph==0){
		   
		   un=document.getElementById("msg3");
		   un.innerHTML="Phone Number Empty";
		   flag=false;
	   }
	   else if(em==0){
		   
		   un=document.getElementById("msg4");
		   un.innerHTML="Email Empty";
		   flag=false;
	   }
	   
	   return flag;
	}

</script>

<?php
 
		if($_POST){
	   
	   $errors=array();
	   
	    if(strlen($_POST['fname'])==0){
		 $errors['error1']="First Name Empty";
		}
		
	    if(strlen($_POST['lname'])==0){
		 $errors['error2']="Last Name Empty"; 
		}
		if(strlen($_POST['phone'])!=11){
		 $errors['error3']="Invalid Phone Number"; 
		}	
		if(filter_var($_POST['mail'], FILTER_VALIDATE_EMAIL)==false){
		 $errors['error4']="Invalid Email Address"; 
		}
		
		if(count($errors)==0){
			
			$fastname=$_POST["fname"];
			$lastname=$_POST["lname"];
			$phone=$_POST["phone"];
			$mail=$_POST["mail"];
			
			
			$x=updateSQL("UPDATE registrationtable set First_Name='$fastname',Last_Name='$lastname',Phone='$phone',Email='$mail' where User_Name='$u' ");
			
			echo "<script type='text/javascript'>alert('Profile Updated Successfully!')</script>";
		 
		 
				echo " <script>window.location='profile.php';</script> ";
		}
	}


?>

<script>
// xmlhttp = new XMLHttpRequest();
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

<link rel="stylesheet" type="text/css"  href="profile.css" >

<body class="main">

    <div class="container"> </div>
   <?php include "inc/user_navi_bar.php";?>
	
	 
	
	 
	
	
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
		
		$all=array();
		    
			 
	        getAllDataFromDB("Select * from registrationtable where User_Name='$u'");
			
			$p=$all[0];
			
			/*echo "<pre>";
			
			print_r($all);
			
			
			echo "</pre>";*/
			


		
	?>
	
	
		<form  action="" name="profileedit" method="post">
		<table class ="editform">
		<tr>
		<td>
		First Name:
		</td>
		
		<td>
		<input type="text" name="fname" onkeyup="validation()" value="<?php echo $p["First_Name"];  ?>">
		</td>
		<td>
		<span id="msg1"></span>
		</td>
		</tr>
		</br>
		</br>
		
		<tr>
		<td>
		Last Name:
		</td>
		
		<td>
		<input type="text" name="lname" onkeyup="validation()" value="<?php echo $p["Last_Name"];  ?>">		
		</td>
		<td>
		<span id="msg2"></span>
		</td>
		</tr>
		</br>
		</br>
		
		
		</br>
		</br>
		
		
		<tr>
		<td>
		Phone Number:
		</td>
		
		<td>
		<input type="text" name="phone" onkeyup="validation()" value="<?php echo $p["Phone"];  ?>">		
		</td>
		<td>
		<span id="msg3"></span>
		</td>
		</tr>
	
		
		</br>
		</br>
		
		<tr>
		<td>
		Email:
		</td>
		
		<td>
		<input type="text" name="mail" onkeyup="validation()" value="<?php echo $p["Email"];  ?>">	
		</td>
		<td>
		<span id="msg4"></span>
		</td>
		</tr>
		
		<tr>
		
		
		<td>
		<div><input type="submit" class="button" onclick="return validation()" value="Confirm Changes" /></div>	
		</td>
		<td>
		<div><a href="eeditprofile.php">Change Password </a></div>
		</td>
		</tr>
		
		
		</br>
		</br>
		
		
		
		</table>
		</form>
		
		

		
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
</body>