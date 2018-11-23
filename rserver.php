
<?php


require("DB.php");

//echo($_GET["pass"]);




if(isset($_REQUEST["usname"]) && strlen($_REQUEST["usname"])>0)
	{
		//$sq="select * from registrationtable where Email like '".$_REQUEST["mail"]."%'";
		
		$p=$_GET["usname"];
		
		$sq="select * from registrationtable where User_Name='$p'";
		
		$a=getAdDataFromDB($sq);
		
		foreach($a as $v)
		{
			echo "<p>";		
			
		    if($v["User_Name"]==$p){
			
			echo "Username Already Exist";
			
			}
			
			echo "</p>";
		}
		
	}

else if(isset($_REQUEST["mail"]) && strlen($_REQUEST["mail"])>0)
	{
		//$sq="select * from registrationtable where Email like '".$_REQUEST["mail"]."%'";
		
		$p=$_GET["mail"];
		
		$sq="select * from registrationtable where Email='$p'";
		
		$a=getAdDataFromDB($sq);
		
		foreach($a as $v)
		{
			echo "<p>";		
			
		    if($v["Email"]==$p){
			
			echo "Email Already Exist";
			
			}
			
			echo "</p>";
		}
		
	}
	
	/*else if(isset($_REQUEST["pass"]) && strlen($_REQUEST["pass"])>0)
	{
		//$sq="select * from registrationtable where Email like '".$_REQUEST["mail"]."%'";
		
		$p=$_GET["pass"];
		
		$sq="select * from registrationtable where Pass='$p'";
		
		$a=getAdDataFromDB($sq);
		
		foreach($a as $v)
		{
			//echo "<p>";		
			
		    if($v["Pass"]==$p){
				
				echo($v["Pass"]);
			
			echo "Current Password Match";
			
			echo($p);
			
			}
			 if($p==$v["Pass"]) {
				echo($p);
				echo "Current Password Match";
								echo($v["Pass"]);
			}
			else{
				echo "Current Password Doesn't Match";
			}
			
			//echo "</p>";
		}
		
	}*/
	
$i=0;
$s="";
while($i<1000000)
	{
		$s.="abcbcbaba";$i++;
	}
	
	
?>