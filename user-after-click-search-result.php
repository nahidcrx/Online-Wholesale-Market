
<?php



if(!isset($_COOKIE["access"])){
	
	header("Location:login.php?");
 
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
			var url="userserver.php?prname="+v;
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
		    <li> <a href='locationresult.php?variable=Barisal' > Barisal </a> </li>
			 <li> <a href='locationresult.php?variable=Chittagong' > Chittagong </a> </li>
			 <li> <a href='locationresult.php?variable=Dhaka' > Dhaka </a> </li>
			 <li> <a href='locationresult.php?variable=Khulna' > Khulna </a> </li>
			 <li> <a href='locationresult.php?variable=Mymensingh' > Mymensingh </a> </li>
			 <li> <a href='locationresult.php?variable=Rangpur' > Rangpur </a> </li>
			 <li> <a href='locationresult.php?variable=Sylhet' > Sylhet </a> </li>
			 <li> <a href='locationresult.php?variable=Rajshahi' > Rajshahi </a> </li>
		   
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
	
	<br>
<br><br><br><br><br><br>	
	<?php

//echo "i am here";
//echo ($_REQUEST["searchResultprofile"]);
include("DB.php");

// $all=array();
 //include("DB.php");
 
 $sq="select regid from adtable where adid = '".$_REQUEST["searchResultprofile"]."%'";
 
 $y=getSingleDataFromDB($sq);
 

 
 
  foreach($y as $cat)
  {
	   $id=$cat['regid'];
	   //echo $id;
  }

  
  $x=getAllDataFromDB("Select * from registrationtable where ID='$id'");
   /*foreach($x as $c)
			{
		        echo "<b>First Name:</b>".$c['First_Name'].""."</br> <b>Last Name:</b>".$c["Last_Name"]."</br><b>Phone No:</b>".$c["Phone"]."</br><b>Division:</b>".$c["Division"]."</br><b>District:</b>".$c["District"]."</br><b>User Type:</b>".$c["User_Type"]."</br><b>Email:</b>".$c["Email"];
			}
			*/
  ?>
  
  
 
			<?php foreach($x as $cat){
							 
							 
				// $a=$cat['photo'];
				 ?>
		<div class="dbtable">	
		       <div class="dbinfo">
				       <b>First Name :</b> <?php echo $cat["First_Name"]; ?> <br>
					   <b> Last Name:</b> <?php echo $cat["Last_Name"]; ?> <br>
					   <b> Contact:</b> <?php echo $cat["Phone"]; ?><br>
					   <b>Location:</b> <?php echo $cat["Division"]; ?><br>
					   <b> Type:</b> <?php echo $cat["User_Type"]; ?><br>
					  <b>Contact:</b> <?php echo $cat["Phone"]; ?><br> 
					  <b>Email:</b> <?php echo $cat["Email"]; ?><br> 
					  <!--a href='after-click-search-result.php?searchResultprofile= <?php// echo $cat["adid"]; ?>' ><h3>View profile</h3></a-->
        <!--a href="#" >Update</a>					 
        <a href="#" >Edit</a-->					 

					 </div>
					    <!--img src="<?php //echo $cat["photo"]; ?>" width='250' height='150' /--> 
					   
				
		</div>
		   <?php } ?>
			
			
			
			
			
			
		<?php	
			
			echo "<br><br><br><br><br>";

			
			echo "<h2>All Post</h2>";

			echo "<br><br><br><br><br>";

 $z=getADataFromDB("Select * from adtable where regid='$id'");
 
	/*foreach($z as $v)
	{
		echo "<b>Product Name :</b>".$v["product_name"]."</br><b> quantity:</b>".$v["quantity"]." </br><b> price:</b> ".$v["price_per_unit"]." </br><b>description:</b>".$v["description"]." </br><b>date:</b>".$v["date"];
		
				//echo "<div>".$v['quantity']."</div>";
				echo "<br>";

				echo "<img src='".$v["photo"]."' width='250' height=150'/><br/>";
				
				
	}
*/

?>
<?php foreach($z as $cat){
							 
							 
				 $a=$cat['photo'];?>
		<div class="dbtable">	
		       <div class="dbinfo">
				       <b>Product Name :</b> <?php echo $cat["product_name"]; ?> <br>
					   <b> Quantity:</b> <?php echo $cat["quantity"]; ?> <br>
					   <b> Price:</b> <?php echo $cat["price_per_unit"]; ?><br>
					   <b>Description:</b> <?php echo $cat["description"]; ?><br>
					   <b>Date:</b> <?php echo $cat["date"]; ?><br>
					  <b>Contact:</b> <?php echo $cat["phone"]; ?><br> 
					     <!--a href="#" >Update</a>					 
        <a href="#" >Edit</a-->					 

					 </div>
					    <img src="<?php echo $cat["photo"]; ?>" width='250' height='150' /> 
					   
				
		</div>
		   <?php } ?>