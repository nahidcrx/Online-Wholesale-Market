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
<br><br><br><br><br><br><br>
<?php

$all=array();
require("DB.php");

//echo "i am here";

//echo ($_REQUEST["searchResult"]);

if(isset($_REQUEST["searchResult"]) && strlen($_REQUEST["searchResult"])>0){
	
	$sq="select * from adtable where adid like '".$_REQUEST["searchResult"]."%'";
	//echo $sq;
	$a=getAdDataFromDB($sq);
	/*foreach($a as $v){
		//echo "<p>";
		//echo $v["product_name"];
		//echo<div>
		echo $v["product_name"]."</br> quantity:".$v["quantity"]." </br> price: ".$v["price_per_unit"]." </br>description:".$v["description"]." </br>date:".$v["date"]." </br>phone:".$v["phone"];
		//echo "</br>"
		//echo "<h1>".$v['product_name']."</h1>";
		echo "<div>".$v['quantity']."</div>";
		echo "<img src='".$v["photo"]."' width='300' height=250'/><br/>";

		echo "<a href='after-click-search-result.php?searchResultprofile=".$v['adid']."'><h3>View profile</h3></a>";
		//echo "</p>";
	}*/
	//echo "Hello : ".$_REQUEST["uname"];
}
//echo "<a href=''>".$_REQUEST['searchResult']."</a>";

//echo ".$cat['cname'].";
//print_r($a);

?>



	<?php foreach($a as $cat){
							 
							 
				 $a=$cat['photo'];?>
		<div class="dbtable">	
		       <div class="dbinfo">
				       <b>Product Name :</b> <?php echo $cat["product_name"]; ?> <br>
					   <b> quantity:</b> <?php echo $cat["quantity"]; ?> <br>
					   <b> price:</b> <?php echo $cat["price_per_unit"]; ?><br>
					   <b>description:</b> <?php echo $cat["description"]; ?><br>
					   <b>date:</b> <?php echo $cat["date"]; ?><br>
					  <b>phone:</b> <?php echo $cat["phone"]; ?><br> 
					  <a href='user-after-click-search-result.php?searchResultprofile= <?php echo $cat["adid"]; ?>' ><h3>View profile</h3></a>
       					 

					 </div>
					    <img src="<?php echo $cat["photo"]; ?>" width='250' height='150' /> 
					   
				
		</div>
		   <?php } ?>