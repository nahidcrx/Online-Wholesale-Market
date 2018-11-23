
<?php



if(!isset($_COOKIE["access"])){
	
	header("Location:adminlogin.php?");
 
}

?>

<!doctype html>
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
			var url="server.php?prname="+v;
			//alert(url);
			xmlhttp.open("GET", url,true);
			xmlhttp.send();
		}
</script>


<title>Online Shopping</title>
<link rel="stylesheet" type="text/css"  href="home.css" >
</head>

<body class="main">
    <div class="navigation">
	<ul>
		<li> <a href="home.php" > Home </a>
	     <li> <a href="menu.php" > Menu </a>
		    <!--ul>
			     <li> <a href="" > RICE </a> </li>
				 <li> <a href="" > FISH </a> </li>
				 <li> <a href="" > MEAT </a> </li>
				 <li> <a href="" > VEGETABLES  </a></li>
				 <li> <a href="" > MILK </a> </li>
			     <li> <a href="" > FRUITS </a> </li>
				  
			
			</ul-->
		 </li>
		 <li> <a href="logout.php" > Logout </a> </li>
		 <!--li> <a href="reg.php" > Registration </a> </li-->
	
	</ul>
	</div>
	
	
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
	
<br><br>
<br>
<br>

	
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
			 
	         getAllDataFromDB("Select * from categorytable");
	
				$c=0;

			 foreach($all as $cat){
				
				 
				 $a=$cat['curl'];

				 echo "<a href='scategory.php?cname=".$cat['cname']."'><b>".$cat['cname']."</b><a/>"."";
				 
				
				 
				 
				 echo "<img src='".$cat["curl"]."' width='300' height='250'/>";
				 
				 $c=$c+1;
				 
				 if($c==3){
					 echo "</br></br></br>";
					 $c=0;
				 }

			 }
			 
			 
		
		
		
		?>
		
 </form>
</html>
 
 
 