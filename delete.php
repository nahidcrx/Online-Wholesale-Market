

<?php



if(!isset($_COOKIE["access"])){
	
	header("Location:login.php?");
 
}

?>

<?php
$all=array();
 include("DB.php");
echo ($_REQUEST["delete"]);
//DELETE FROM `adtable` WHERE `adtable`.`adid` = 18;
$sql="DELETE  FROM adtable where adid= '".$_REQUEST["delete"]."'";
updateSQL($sql);

				echo "<script type='text/javascript'>alert('Ad Deleted Successfully!')</script>";
		 
		 
				echo " <script>window.location='profile.php';</script> ";

//echo "success";
//header("refresh:0; url=profile.php");
?>