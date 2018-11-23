
<?php



if(!isset($_COOKIE["access"])){
	
	header("Location:login.php?");
 
}

?>

<html>

<head>

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


<title>Online Shopping</title>
<link rel="stylesheet" type="text/css"  href="profile.css" >
</head>

<body class="main">
     <div class="container"> </div>
	 <div class="mrq">
	<marquee >Agriculture is the largest employment sector in Bangladesh. The performance of this sector has an overwhelmig impact on major macroeconomic objectives like employment generation, poverty alleviation, human resources development,food security etc.A plurality of Bangladeshis earn their living from agriculture. Although rice and jute are the primary crops, wheat is assuming greater importance. Tea is grown in the northeast. Because of Bangladesh's fertile soil and normally ample water supply, rice can be grown and harvested three times a year in many areas. Due to a number of factors, Bangladesh's labour-intensive agriculture has achieved steady increases in food grain production despite the often unfavorable weather conditions. These include better flood control and irrigation, a generally more efficient use of fertilizers, and the establishment of better distribution and rural credit networks. With 35.8 million metric tons produced in 2000, rice is Bangladesh's principal crop. National sales of the classes of insecticide used on rice, including granular carbofuran, synthetic pyrethroids, and malathion exceeded 13,000 tons of formulated product in 2003.[1] The insecticides not only represent an environmental threat, but are a significant expenditure to poor rice farmers. The Bangladesh Rice Research Institute is working with various NGOs and international organisations to reduce insecticide use in rice.[2] </marquee>
	</div>
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
	
	

</body>


</br>
</br>
</br>
</br>
</br></br></br>


<form action="" method="post" enctype="multipart/form-data" name="user">
	
		<?php
		
		     $all=array();
		     include("DB.php");
			 
	         getAllDataFromDB("Select * from adtable");
	
				/*$c=0;

			 foreach($all as $cat){
				
				 
				 $a=$cat['curl'];

				 echo "<a href='scategory.php?cname=".$cat['cname']."'>".$cat['cname']."<a/>"."         ";
				 
				 echo "<img src='".$cat["curl"]."' width='300' height='250'/>";
				  
				 $c=$c+1;
				 
				 if($c==3){
					 echo "</br></br></br>";
					 $c=0;
				 }

			 }*/
			 	//		 foreach($all as $cat){
				 
				 
				 
				 //echo $cat['cname'];
			//	 $a=$cat['photo'];
				 	

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
				 
				// echo "<p href='details.php?sid=".$cat['adid']."'>".$cat['product_name']."<p/><br/>";
				 
				 //echo "<p href='details.php?sid=".$cat['adid']."'>".$cat['product_category']."<p/><br/>";
				 
				 //echo "<p href='details.php?sid=".$cat['adid']."'>".$cat['quantity']."<p/><br/>";
				 //echo "<p href='details.php?sid=".$cat['adid']."'>".$cat['price_per_unit']."<p/><br/>";
				// echo "<p href='details.php?sid=".$cat['adid']."'>".$cat['description']."<p/><br/>";
				// echo "<p href='details.php?sid=".$cat['adid']."'>".$cat['division']."<p/><br/>";
				 //echo "<a href='details.php?sid=".$cat['sid']."'>".$cat['sname']."<a/><br/>";
//echo "<img src='".$cat["photo"]."' width='300' height=250'/><br/>";
			//	 echo "<b>Product Name :</b>".$cat["product_name"]."</br><b> quantity:</b>".$cat["quantity"]." </br><b> price:</b> ".$cat["price_per_unit"]." </br><b>description:</b>".$cat["description"]." </br><b>date:</b>".$cat["date"];
		
				//echo "<div>".$v['quantity']."</div>";
			//	echo "<br>";

			//	echo "<img src='".$cat["photo"]."' width='250' height=150'/><br/>";
			//	echo "<a href='after-click-search-result.php?searchResultprofile=".$cat['adid']."'><h3>View profile</h3></a>";
		

				// echo "<br>";
				 
				 

			// }

			 
			 
		
		
		
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
					  <a href='user-after-click-search-result.php?searchResultprofile= <?php echo $cat["adid"]; ?>' ><h3>View profile</h3></a>
        					 

					 </div>
					    <img src="<?php echo $cat["photo"]; ?>" width='250' height='150' /> 
					   
				
		</div>
		   <?php } ?>
		
		</form>
		
		</html>
