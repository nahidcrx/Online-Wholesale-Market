
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
	$all=array();
		     include("DB.php");
			 
	      $x=  getAllDataFromDB("Select * from registrationtable");
			
			
			
			echo "<br><br><br>";
			
			echo "<br><br><br>";
		
	
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
					   <b>User Type:</b> <?php echo $cat["User_Type"]; ?><br>
					 
					  <b>Email:</b> <?php echo $cat["Email"]; ?><br> 
					  <a href='adminviewpost.php?profileID= <?php echo $cat["ID"]; ?>' ><h3>View post</h3></a>
					  <a href='admindelete.php?delete= <?php echo $cat["ID"]; ?>' ><h3>Delete User</h3></a>
        				 
     					 

					 </div>
					    <!--img src="<?php //echo $cat["photo"]; ?>" width='250' height='150' /--> 
					   
				
		</div>
		   <?php } ?>