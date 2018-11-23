<!doctype html>



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

<html>

<head>

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
		
	</div><br>
<form class="menuForm" action="" method="post" enctype="multipart/form-data" name="user">
	
	
	 
		<?php
		
		     $all=array();
		     include("DB.php");
			 
	         getAllDataFromDB("Select * from categorytable");
	
				$c=0;

			 foreach($all as $cat){
				echo "<div class='menuCat'>";
				 
				 $a=$cat['curl'];

				 
				 
				 
				 echo "<img src='".$cat["curl"]."' />";
			 echo "<a class='anchorMenu' href='scategory.php?cname=".$cat['cname']."'>".$cat['cname']."<a/>";
				 $c=$c+1;
				 echo "</div>";

    
			 }
			 
			 
		
		
		
		?> 
		
 </form>
</html>
 
 
 