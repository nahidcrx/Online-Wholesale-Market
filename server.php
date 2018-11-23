<html>
<head>

<link rel="stylesheet" type="text/css"  href="profile.css" >
</head>
<body>
<?php




//echo "<a href=''>".$_REQUEST['prname']."</a>";
//echo "<a href='scategory.php?cid=".$cat['cid']."'>".$cat['cname']."<a/><br/>";

require("DB.php");



if(isset($_REQUEST["prname"]) && strlen($_REQUEST["prname"])>0){
	$sq="select * from adtable where product_name like '".$_REQUEST["prname"]."%'";
	//echo $sq;
	$a=getAdDataFromDB($sq);
	foreach($a as $v){
		echo "<p class='searchR' >";
		//echo $v["product_name"];
		//echo $v["product_name"]." from ".$v["product_category"];
		//echo <a herf=''>".$v['product_name']."</a>";
		
		echo "<a  href='searchResult.php?searchResult=".$v['adid']."'>".$v['product_name']."</a>";
		echo "</p>";
	}
	//echo "Hello : ".$_REQUEST["uname"];
}
/*else if(isset($_REQUEST["ist"]))
	{
		$s="insert into student values('null','".$_REQUEST["un"]."','".$_REQUEST["cg"]."','CS')";
		echo $s;
		if(updateSQL($s))
			echo "Data Saved";
		else
			echo "Data Save Error!";
	}
else
	{
		echo "Invalid Parameter!";
	}
//echo "this output is from server<br>";
$i=0;
$s="";
while($i<1000000)
	{
		$s.="abcbcbaba";$i++;
	}
	*/
?>
</body>
</html>