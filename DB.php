<?php

function getJSONFromDB($sql){
	$conn = mysqli_connect("localhost", "root", "","mydb");
	//echo $sql;
	$result = mysqli_query($conn, $sql)or die(mysqli_error($conn));
	$all=array();
	//print_r($result);
	while($row = mysqli_fetch_assoc($result)) {
		$all[]=$row;
	}
	return json_encode($all);
}


function updateSQL($sql){
	//echo $sql;
	$conn = mysqli_connect("localhost", "root", "","mydb");
	$result = mysqli_query($conn, $sql)or die(mysqli_error());
	return $result;
}

function updateDB($sql){
	
	//echo $sql;
	
	$conn = mysqli_connect("localhost", "root", "", "mydb");
	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	}
	if(mysqli_query($conn, $sql)) {
		
		//header("Location:apppnd.php?");
		//echo "Success";
	}
	else{
		
		//$ue="Duplicate User Name";
		//$_SESSION["uerror"]=$ue;
		
		echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	}
}

function getAdminDataFromDB($sql){
	global $auth;
	
	$conn = mysqli_connect("localhost", "root", "","mydb");
	$result = mysqli_query($conn, $sql)or die(mysqli_error($conn));
	
	//print_r($result);
	
	while($row = mysqli_fetch_assoc($result)) {
		$auth[$row["username"]]=$row["pass_word"];
	}
	return $auth;
}

function getDataFromDB($sql){
	global $auth;
	
	$conn = mysqli_connect("localhost", "root", "","mydb");
	$result = mysqli_query($conn, $sql)or die(mysqli_error($conn));
	
	//print_r($result);
	
	while($row = mysqli_fetch_assoc($result)) {
		$auth[$row["User_Name"]]=$row["Pass"];
	}
	return $auth;
}

function getPhotoFromDB($sql){
	global $ph;
	
	$conn = mysqli_connect("localhost", "root", "","mybd");
	$result = mysqli_query($conn, $sql)or die(mysqli_error($conn));
	
	//print_r($result);
	
	while($row = mysqli_fetch_assoc($result)) {
		$ph[$row["User_Name"]]=$row["p_path"];
		//$ph[]=$row;
	}
	return $ph;
}

function getSingleDataFromDB($sql){
	
	global $single;
		
	$conn = mysqli_connect("localhost", "root", "","mydb");

	$result = mysqli_query($conn, $sql)or die(mysqli_error($conn));

	while($row = mysqli_fetch_assoc($result)) {
		$single[]=$row;
	}
	return $single;
}

function getAllDataFromDB($sql){
	
	global $all;
		
	$conn = mysqli_connect("localhost", "root", "","mydb");

	$result = mysqli_query($conn, $sql)or die(mysqli_error($conn));

	while($row = mysqli_fetch_assoc($result)) {
		$all[]=$row;
	}
	return $all;
}


function getAdDataFromDB($sql){
	$conn = mysqli_connect("localhost", "root", "","mydb");
	//echo $sql;
	$result = mysqli_query($conn, $sql)or die(mysqli_error($$conn));
	$arr=array();
	//print_r($result);
	while($row = mysqli_fetch_assoc($result)) {
		$arr[]=$row;
	}
	return $arr;
}
function getADataFromDB($sql){
	$conn = mysqli_connect("localhost", "root", "","mydb");
	//echo $sql;
	$result = mysqli_query($conn, $sql)or die(mysqli_error($$conn));
	$arr=array();
	//print_r($result);
	while($row = mysqli_fetch_assoc($result)) {
		$arr[]=$row;
	}
	return $arr;
}

?>