
<?php



if(!isset($_COOKIE["access"])){
	
	header("Location:adminlogin.php?");
 
}

?>

<?php
$all=array();
 include("DB.php");
echo ($_REQUEST["delete"]);
//DELETE FROM `adtable` WHERE `adtable`.`adid` = 18;
$sql="DELETE  FROM adtable where adid= '".$_REQUEST["delete"]."'";
updateSQL($sql);

//echo "Success";
//header("refresh:0; url=admin.php");

echo "<script type='text/javascript'>alert('User Ad Deleted Successfully!')</script>";
		 
		 
				echo " <script>window.location='admin.php';</script> ";
?>