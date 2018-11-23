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
   <?php include "inc/navi_bar.php";?>
	
	
	 
	
	
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
	
	
	<br>	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>


<?php

$p=$_GET["cname"];

//echo "$p";

             $all=array();
		     include("DB.php");
			 
	         getAllDataFromDB("Select * from adtable where product_category='$p'");
			 
			 
			 
			 //echo "<pre>" ;print_r($all); echo "<pre>" ;
			 
			/* foreach($all as $cat){
				 
				 
				 
				 //echo $cat['cname'];
				 $a=$cat['photo'];
				 	

                // echo "<img width='200' height= '200' src='$a'";
				 
				 //echo "<a href=scategory.php"
				 //echo "<p>product_name :</p>";
				 
				 /*echo "<a href='details.php?sid=".$cat['adid']."'>".$cat['product_name']."<a/><br/>";
				 echo "<p href='details.php?sid=".$cat['adid']."'>".$cat['product_category']."<p/><br/>";
				 echo "<p href='details.php?sid=".$cat['adid']."'>".$cat['quantity']."<p/><br/>";
				 echo "<p href='details.php?sid=".$cat['adid']."'>".$cat['price_per_unit']."<p/><br/>";
				 echo "<p href='details.php?sid=".$cat['adid']."'>".$cat['description']."<p/><br/>";
				 echo "<p href='details.php?sid=".$cat['adid']."'>".$cat['division']."<p/><br/>";
				 //echo "<a href='details.php?sid=".$cat['sid']."'>".$cat['sname']."<a/><br/>";
	             echo "<img src='".$cat["photo"]."' width='200' height=200'/><br/>";
				 
				 echo "<br>";*/
				 
				 //echo "<p href='details.php?sid=".$cat['adid']."'>".$cat['product_name']."<p/><br/>";
				 
				 //echo "<p href='details.php?sid=".$cat['adid']."'>".$cat['product_category']."<p/><br/>";
				 
				 //echo "<p href='details.php?sid=".$cat['adid']."'>".$cat['quantity']."<p/><br/>";
				 //echo "<p href='details.php?sid=".$cat['adid']."'>".$cat['price_per_unit']."<p/><br/>";
				 //echo "<p href='details.php?sid=".$cat['adid']."'>".$cat['description']."<p/><br/>";
				 //echo "<p href='details.php?sid=".$cat['adid']."'>".$cat['division']."<p/><br/>";
				 //echo "<a href='details.php?sid=".$cat['sid']."'>".$cat['sname']."<a/><br/>";
	             //echo "<img src='".$cat["photo"]."' width='300' height=250'/><br/>";
				 
				 //echo "<br>";
				/* echo "<b>Product Name :</b>".$cat["product_name"]."</br><b> quantity:</b>".$cat["quantity"]." </br><b> price:</b> ".$cat["price_per_unit"]." </br><b>description:</b>".$cat["description"]." </br><b>date:</b>".$cat["date"]." </br><b>phone:</b>".$cat["phone"];
		
				//echo "<div>".$v['quantity']."</div>";
				echo "<br>";

				echo "<img src='".$cat["photo"]."' width='250' height=150'/><br/>";
				 echo "<a href='after-click-search-result.php?searchResultprofile=".$cat['adid']."'><h3>View profile</h3></a>";
		echo "<br>";echo "<br>";
				 }
				 */
				 
				 ?>
<?php foreach($all as $cat){
							 
							 
				 $a=$cat['photo'];?>
		<div class="dbtable">	
		       <div class="dbinfo">
				       <b>Product Name :</b> <?php echo $cat["product_name"]; ?> <br>
					   <b> Quantity:</b> <?php echo $cat["quantity"]; ?> <br>
					   <b> Price:</b> <?php echo $cat["price_per_unit"]; ?><br>
					   <b>Description:</b> <?php echo $cat["description"]; ?><br>
					   <b>Date:</b> <?php echo $cat["date"]; ?><br>
					  <b>Contact:</b> <?php echo $cat["phone"]; ?><br> 
					  <a href='after-click-search-result.php?searchResultprofile= <?php echo $cat["adid"]; ?>' ><h3>View Profile</h3></a>
        				 

					 </div>
					    <img src="<?php echo $cat["photo"]; ?>" width='250' height='150' /> 
					   
				
		</div>
		   <?php } ?>
			

