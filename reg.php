
<script type="text/javascript">

   function validation(){
	   var flag=true;
	   var fname=document.regform.fastname.value.length;
	   var lname=document.regform.lastname.value.length;
	   var uname=document.regform.username.value.length;
	   var pass=document.regform.password.value.length;
	   var cpass=document.regform.Cpassword.value.length;
	   var passv=document.regform.password.value;
	   var cpassv=document.regform.Cpassword.value;
	   var phone=document.regform.phn.value.length;
	   var mail=document.regform.mail.value.length;
	   var mailv=document.regform.mail.value;
	   var nid=document.regform.nid.value.length;
	   
	   document.getElementById("msg1").innerHTML="";
	   document.getElementById("msg2").innerHTML="";
	   document.getElementById("msg3").innerHTML="";
	   document.getElementById("msg4").innerHTML="";
	   document.getElementById("msg5").innerHTML="";
	   document.getElementById("msg6").innerHTML="";
	   document.getElementById("msg7").innerHTML="";
	   if(fname==0){
		   
		   un=document.getElementById("msg1");
		   un.innerHTML="First Name Empty";
		   flag=false;
	   }
	   else if(lname==0){
		   
		   un=document.getElementById("msg2");
		   un.innerHTML="Last Name Empty";
		   flag=false;
	   }
	   else if(uname==0){
		   
		   un=document.getElementById("msg3");
		   un.innerHTML="User Name Empty";
		   flag=false;
	   }
	   else if(uname<5){
		   
		   un=document.getElementById("msg3");
		   un.innerHTML="User Name Too Short";
		   flag=false;
	   }
	   else if(pass==0){
		   
		   un=document.getElementById("msg4");
		   un.innerHTML="Password Empty";
		   flag=false;
	   }
	   
	   else if(pass<8){
		   
		   un=document.getElementById("msg4");
		   un.innerHTML="Password Is Too Short";
		   flag=false;
	   }
	   
	   else if(cpass==0){
		   
		   un=document.getElementById("msg4");
		   un.innerHTML="Re Enter Password";
		   flag=false;
	   }
	   
	   else if(passv != cpassv){
		   
		   un=document.getElementById("msg4");
		   un.innerHTML="Password Doesn't Match";
		   flag=false;
	   }
	   
	   else if(phone==0){
		   
		   un=document.getElementById("msg5");
		   un.innerHTML="Enter Phone Number";
		   flag=false;
	   }
	   else if(phone<11){
		   
		   un=document.getElementById("msg5");
		   un.innerHTML="Invalid Phone Number";
		   flag=false;
	   }
	   
	   else if(mail==0){
		   
		   un=document.getElementById("msg6");
		   un.innerHTML="Enter Email";
		   flag=false;
	   }
	   
	   else if(mailv.indexOf("@")<1){
		   
		   un=document.getElementById("msg6");
		   un.innerHTML="Invalid Email";
		   flag=false;
	   }
	   
	   else if(nid==0){
		   
		   un=document.getElementById("msg7");
		   un.innerHTML="Enter NID";
		   flag=false;
	   } 
	   else if(nid<13){
		   
		   un=document.getElementById("msg7");
		   un.innerHTML="Invalid NID Number";
		   flag=false;
	   } 
	   
	   return flag;
	   
   }


  function checkusername() 
		{
			//document.getElementById("spinner").style.visibility="visible";
			//var v=document.getElementById("email").value;
			//var v2=document.getElementById("username").value;
			var v=document.getElementById("username").value;
			var  xmlhttp = new XMLHttpRequest();
			
			xmlhttp.onreadystatechange = function() 
				{
					if (xmlhttp.readyState == 4 && xmlhttp.status == 200) 
						{			
							var m=document.getElementById("msg3");
							//m.innerHTML="Ok";
							m.innerHTML=xmlhttp.responseText;
							//document.getElementById("username").value="";
							//document.getElementById("spinner").style.visibility="hidden";
							//alert(xmlhttp.responseText);
						}
				}
			//var url="server.php?ist=ok&un="+v+"&cg="+v2;
			var url="rserver.php?usname="+v;
			//alert(url);
			xmlhttp.open("GET", url,true);
			xmlhttp.send();
		}	

</script>


<?php

   if($_POST){
	   
	   $errors=array();
	   
	    if(strlen($_POST['uname'])<5){
		 $errors['username2']="Username Is Too Short";
		}
		
	    if(strlen($_POST['pass'])<8){
		 $errors['password2']="Password Is Too Short"; 
		}
		if($_POST["cpass"]!=$_POST["pass"] ){
		 $errors['password3']="Password Doesn't Match ";
		}
		if(strlen($_POST['phone'])!=11){
		 $errors['phone']="Invalid Phone Number"; 
		}
		
		if(strlen($_POST['nid'])<13){
		 $errors['nid']="Invalid National ID Number"; 
		}
		
		if(filter_var($_POST['mail'], FILTER_VALIDATE_EMAIL)==false){
		 $errors['mail']="Invalid Email Address"; 
		}
		
		
		
		
		
		
	if(count($errors)==0)
	{
		
		$fastname=$_POST["fastname"];
		$lastname=$_POST["lastname"];
		$uname=$_POST["uname"];
		$pass=md5($_POST["pass"]);
		$phone=$_POST["phone"];
		$div=$_POST["div"];
		//$district=$_POST["district"];
		$typ=$_POST["typ"];
		$mail=$_POST["mail"];
		$nid=$_POST["nid"];
		$gender=$_POST["gender"];
		$day=$_POST["day"];
		$month=$_POST["month"];
		$year=$_POST["year"];
		$nation=$_POST["nation"];
		
		
		include("DB.php");
		
		updateDB("INSERT INTO registrationtable(First_Name,Last_Name,User_Name,Pass,Phone,Division,User_Type,Email,NID,Gender,DB_Date,DB_Month,DB_Year,Nationality) 
		VALUES ('$fastname','$lastname','$uname','$pass','$phone','$div','$typ','$mail','$nid','$gender','$day','$month','$year','$nation') ");
		
		//header("Location:apppnd.php?");
		
		 echo "<script type='text/javascript'>alert('Submitted Successfully!Click Ok For Login')</script>";
		 
		 //header("Location:login.php?");
		 
		 echo " <script>window.location='login.php';</script> ";		 
		 
		 
		
		
		
		

    
		
	
	}
		
		
   }



?>

    <head>
        <title>CSS Registration Form</title>
        
        <link rel="stylesheet" type="text/css" href="reg.css"/>
    </head>
    <body>    
        <form name="regform" action="" method="post" class="register" >
            <h1>Registration</h1>
            <fieldset class="row1">
                <legend>Account Details
                </legend>
                <p>
                    <label>Fast Name : *</label>
                    <input type="text" onkeyup="validation()" name ="fastname" id ="firstname" placeholder = ""> 
					<span id="msg1"></span> </br> </br>
					
                    <label>Last Name : *</label>
                    <input type="text" onkeyup="validation()" name ="lastname" id ="lirstname" placeholder = "">
					<span id="msg2"></span>
                </p>
				<p>
				 <label> User Name : *</label>
					<input type ="text" onkeyup="validation()" name ="uname" id ="username" onfocusout="checkusername()" placeholder="">
					<span id="msg3"></span>
					
				</p>
                <p>
                    <label>Password : * </label>
                    <input type="password" onkeyup="validation()" name ="pass" id ="password" placeholder = ""> </br> </br>
                    <label>Confirm Password : * </label>
                    <input type="password" onkeyup="validation()" name ="cpass" id ="Cpassword" placeholder = "">
					<span id="msg4"></span>
                    
                </p>
				
            </fieldset>
            <fieldset class="row2">
                <legend>Personal Details
                </legend>
               
                <p>
                    <label>Phone :*
                    </label>
                    <input type="text" onkeyup="validation()" id="phn" name="phone" maxlength="11" >
					<span id="msg5"></span>
                </p>

                <p>
                    <label>Division :*
                    </label>
                    <select name="div" class = "division">
						<option value="Dhaka">Dhaka</option>
						<option value="Chittagong">Chittagong</option>
						<option value="Rajshahi">Rajshahi</option>
						<option value="Khulna">Khulna</option>
						<option value="Barisal">Barisal</option>
						<option value="Sylhet">sylhet</option>
						<option value="Rangpur">Rangpur</option>
						<option value="Mymensingh">Mymensingh</option>
					</select>
                </p>
                <p>
                    <label>User Type : *
                    </label>
                    <select name="typ" >
                        <option value="buyer">Buyer</option>
                        <option value="seller">Seller</option>
                    </select>
                </p>
				 <p>
                    <label class="">E-mail :</label>
                    <input type="text" onkeyup="validation()" id="mail" name="mail"  class="long" placeholder="example@mail.com"/>
					<span id="msg6"></span>
					
                </p>
                <p>
                    <label class="">NID :*
                    </label>
                    <input onkeyup="validation()" id="nid" class="long"  type="text" name="nid" value="" >
					<span id="msg7"></span>

                </p>
            </fieldset>
            <fieldset class="row3">
                <legend>Further Information
                </legend>
                <p>
                    <label>Gender : *</label>
                    <input type="radio" value="Male" name ="gender" >
                    <label class="gender">Male</label>
                    <input type="radio" value="Female" name="gender" >
                    <label class="gender">Female</label>
                </p>
                <p>
                    <label>Birthdate *
                    </label>
                    <select name="day" class="date">
                        <option value="1">01
                        </option>
                        <option value="2">02
                        </option>
                        <option value="3">03
                        </option>
                        <option value="4">04
                        </option>
                        <option value="5">05
                        </option>
                        <option value="6">06
                        </option>
                        <option value="7">07
                        </option>
                        <option value="8">08
                        </option>
                        <option value="9">09
                        </option>
                        <option value="10">10
                        </option>
                        <option value="11">11
                        </option>
                        <option value="12">12
                        </option>
                        <option value="13">13
                        </option>
                        <option value="14">14
                        </option>
                        <option value="15">15
                        </option>
                        <option value="16">16
                        </option>
                        <option value="17">17
                        </option>
                        <option value="18">18
                        </option>
                        <option value="19">19
                        </option>
                        <option value="20">20
                        </option>
                        <option value="21">21
                        </option>
                        <option value="22">22
                        </option>
                        <option value="23">23
                        </option>
                        <option value="24">24
                        </option>
                        <option value="25">25
                        </option>
                        <option value="26">26
                        </option>
                        <option value="27">27
                        </option>
                        <option value="28">28
                        </option>
                        <option value="29">29
                        </option>
                        <option value="30">30
                        </option>
                        <option value="31">31
                        </option>
                    </select>
                    <select name="month" >
                        <option value="January">January
                        </option>
                        <option value="February">February
                        </option>
                        <option value="March">March
                        </option>
                        <option value="April">April
                        </option>
                        <option value="May">May
                        </option>
                        <option value="June">June
                        </option>
                        <option value="July">July
                        </option>
                        <option value="August">August
                        </option>
                        <option value="September">September
                        </option>
                        <option value="October">October
                        </option>
                        <option value="November">November
                        </option>
                        <option value="December">December
                        </option>
                    </select>
					<select name="year" class="year">
                        <option value="1991">1991
                        </option>
                        <option value="1992">1992
                        </option>
                        <option value="1993">1993
                        </option>
                        <option value="1994">1994
                        </option>
                        <option value="1995">1995
                        </option>
                        <option value="1996">1996
                        </option>
                        <option value="1997">1997
                        </option>
                        <option value="1998">1998
                        </option>
                        <option value="1999">1999
                        </option>
                        <option value="2000">2000
                        </option>
                    
                    </select>
                    
                </p>
                <p>
                    <label>Nationality * 
					</label>
                    <select name="nation" >
                        <option value="Bangladeshi">Bangladeshi
                        </option>
                    </select>
                </p>

            </fieldset>
			   
            <div><input type="submit" class="button" onclick="return validation()" value="Register>" /></div>
		
			<div><a href="home.php" class="button" </a>Back</div>
			
		<?php
	 
	    if(isset($errors['username2'])){
		   echo $errors['username2'];
		} 
		
		else if(isset($_SESSION["uerror"])){
			echo $_SESSION["uerror"];
		}
		
		else if(isset($errors['password2'])){
			 echo $errors['password2'];
		}
		else if(isset($errors['password3'])){
			 echo $errors['password3'];
		}
		else if(isset($errors['phone'])){
			 echo $errors['phone'];
		}
		
		else if(isset($errors['mail'])){
			 echo $errors['mail'];
		}
		
		else if(isset($errors['nid'])){
			 echo $errors['nid'];
		}
		
		
	    ?>
			
		
			
        </form>
    </body>	