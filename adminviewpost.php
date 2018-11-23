
<?php



if(!isset($_COOKIE["access"])){
	
	header("Location:adminlogin.php?");
 
}

?>

<link rel="stylesheet" type="text/css"  href="profile.css" >
</head>

<body class="main">
<div class="container"> </div>
    <div class="navigation">
	<ul>
	     <li> <a href="" > Menu </a>
		    <ul>
			     <!--li> <a href="" > RICE </a> </li>
				 <li> <a href="" > FISH </a> </li>
				 <li> <a href="" > MEAT </a> </li>
				 <li> <a href="" > VEGETABLES  </a></li>
				 <li> <a href="" > MILK </a> </li>
			     <li> <a href="" > FRUITS </a> </li-->
				  
			
			</ul>
		 </li>
		
		  <li> <a href="admin.php" > Home</a> </li>
		  <li> <a href="logout.php" > Logout</a> </li>

		  
		  
	
	</ul>
	</div>
	
	 
	
	
	<div class="location">
	<ul>
		
		
		
			 
		 
	</ul>
	</div>
	

	
	
	
	<br><br><br><br><br><br><br><br><br>
	

<?php
	//echo ($_REQUEST["profileID"]);
	

$z=$_REQUEST["profileID"];
	
$all=array();
include("DB.php");


$sq="select * from adtable where regid=$z";

	

//$sq="select * from adtable where division= 'Chittagong'";

//echo $sq;
$x=getAdDataFromDB($sq);

//echo "<pre>";

//print_r($x);

//echo "</pre>";*/

echo "</br>";
echo "</br>";
echo "</br>";
echo "</br>";
echo "</br>";
echo "</br>";
echo "</br>";

/*foreach($x as $v){
		//echo "<p>";
		//echo $v["product_name"];
		//echo "sbssh";
		echo $v["product_name"]."</br> quantity:".$v["quantity"]." </br> price: ".$v["price_per_unit"]." </br>description:".$v["description"]." </br>date:".$v["date"]." </br>phone:".$v["phone"];
		echo "</br>";
		//echo "<h1>".$v['product_name']."</h1>";
		//echo "<div>".$v['quantity']."</div>";
		echo "<img src='".$v["photo"]."' width='300' height=250'/>";
		
		//var url="server.php?ist=ok&un="+v+"&cg="+v2;

		echo "<a href='admindelete.php?searchResultprofile=".$v['adid']."&reg=".$v['regid']."'><h3>Delete</h3></a>";
		//echo "</p>";
	}

*/

	

	
	?>
	
	<?php foreach($x as $cat){
							 
							 
				 $a=$cat['photo'];?>
		<div class="dbtable">	
		       <div class="dbinfo">
				       <b>Product Name :</b> <?php echo $cat["product_name"]; ?> <br>
					   <b> quantity:</b> <?php echo $cat["quantity"]; ?> <br>
					   <b> price:</b> <?php echo $cat["price_per_unit"]; ?><br>
					   <b>description:</b> <?php echo $cat["description"]; ?><br>
					   <b>date:</b> <?php echo $cat["date"]; ?><br>
					  <b>phone:</b> <?php echo $cat["phone"]; ?><br> 

        

					 <a href='adminpostdelete.php?delete= <?php echo $cat["adid"]; ?>' ><h3>Delete</h3></a>		

					 </div>
					    <img src="<?php echo $cat["photo"]; ?>" width='250' height='150' /> 
					   
				
		</div>
		   <?php } ?>