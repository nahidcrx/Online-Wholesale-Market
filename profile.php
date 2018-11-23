<?php



if(!isset($_COOKIE["access"])){
	
	header("Location:login.php?");
 
}

?>

<?php


session_start();

$u=$_SESSION["user"];

//echo($u);

	
	

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
</head>

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
	
	<div class="addpost">
	
		<a  href="adpost.php" > Ad Post </a>

	</div>
	
	
	<div class="editprofile">
	
    <a href="editprofile.php" > Edit My Profile </a>
	</div>
	
	
	<br>	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	</body>

	
	<br>	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>

	<?php
	

	
	
	

	
	     $all=array();
		     include("DB.php");
			 
			 
			 
	        getAllDataFromDB("Select * from registrationtable where User_Name='$u'");
			 
			 
			 
			 foreach($all as $cat){
				 
				 $id=$cat['ID'];
				 $f=$cat['First_Name'];
				 $l=$cat['Last_Name'];
			
			 }
			 
			 echo "<div class='profileName'><h2 ><i>Profile:".$f." ".$l."</i></h2></div>";
			 
			 echo "<br>";
			 
			
			
	?>	
			
		
			
	<?php
	
				$a=getJSONFromDB("Select * from adtable where regid='$id'");
	
				$b=json_decode($a);
	
				/* echo "<pre>";
			   print_r($b);
			 echo "<pre>";*/
			 
			   // $x=$b[0];
				
				//print_r($x);
				
	?>
				
				<?php 
				
   			     foreach($b as $d){
					 
				?>	 
					<div class="dbtable">
					
					<div class="dbinfo">
					
					  
					 
					 <b>Product Name :</b>
					 <?php
					  echo $d->product_name;
					  echo "<br>";
					 ?>
					 <b> Quantity:</b>
					 <?php
					  echo $d->quantity;
					  echo "<br>";
					 ?>
					 <b> Price:</b>
					 <?php
					  echo $d->price_per_unit;
					  echo "<br>";
					  ?>
					 <b>Description:</b>
					 <?php
					  echo $d->description;
					  echo "<br>";
					  ?>
					  <b>Date:</b>
					  <?php
					   echo $d->date;
					   echo "<br>";
					   ?>
					   <b>Contact:</b>
					   <?php
					  echo $d->phone;
					  echo "<br>";
					  ?>
					  <b>Location:</b>
					   <?php
					  echo $d->division;
					  echo "<br>";
					  ?>
					  				 
						<a href="delete.php?delete=<?php echo $d->adid;?>" ><h2>Delete</h2></a>
					  
					  
					  </div>
					  
					<?php echo "<img src='".$d->photo."' width='250' height=150'/><br/>"; ?>
							 
				</div>

				
				<?php } ?>
					
				 
			
		
 
			
		 

	
	

	
	
			

	
	