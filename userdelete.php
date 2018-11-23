
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
$sql="DELETE  FROM adtable where regid= '".$_REQUEST["delete"]."'";
updateSQL($sql);

$sq="DELETE  FROM registrationtable where ID= '".$_REQUEST["delete"]."'";
updateSQL($sq);

//echo "success";
//header("refresh:0; url=admin.php");

					echo "<script type='text/javascript'>alert('User Deleted Successfully!')</script>";
		 
		 
				    echo " <script>window.location='admin.php';</script> ";
?>