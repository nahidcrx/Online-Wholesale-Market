
<?php



if(!isset($_COOKIE["access"])){
	
	header("Location:login.php?");
 
}

?>

<script type="text/javascript">

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
			var url="userserver.php?prname="+v;
			//alert(url);
			xmlhttp.open("GET", url,true);
			xmlhttp.send();
		}

	function validation()
	{
		var flag=true;
	    var pn=document.adpost.pname.value.length;
		var pc=document.adpost.product_category.value.length;
		var pp=document.adpost.fileToUpload.value.length;
	    var pq=document.adpost.quantity.value.length;
	    var pu=document.adpost.price_per_unit.value.length;
	    var pd=document.adpost.peoduct_discribetion.value.length;
		var ph=document.adpost.phone.value.length;
		var pdv=document.adpost.product_division.value.length;
	   
	   
	   document.getElementById("msg1").innerHTML="";
	   document.getElementById("msg2").innerHTML="";
	   document.getElementById("msg3").innerHTML="";
	   document.getElementById("msg4").innerHTML="";
	   document.getElementById("msg5").innerHTML="";
	   document.getElementById("msg6").innerHTML="";
	   document.getElementById("msg7").innerHTML="";
	   document.getElementById("msg8").innerHTML="";
	   
	   if(pn==0){
		   
		   un=document.getElementById("msg1");
		   un.innerHTML="Product Name Empty";
		   flag=false;
	    }
	
	   else if(pc==0){
		   
		   un=document.getElementById("msg2");
		   un.innerHTML="Product Ctegory Empty";
		   flag=false;

		}
		else if(pp==0){
		   
		   un=document.getElementById("msg3");
		   un.innerHTML="Please Select Product Picture";
		   flag=false;

		}
		else if(pq==0){
		   
		   un=document.getElementById("msg4");
		   un.innerHTML="Product Quantity Empty";
		   flag=false;

		}
		else if(pu==0){
		   
		   un=document.getElementById("msg5");
		   un.innerHTML="Product Price Empty";
		   flag=false;

		}
		else if(pd==0){
		   
		   un=document.getElementById("msg6");
		   un.innerHTML="Product Description Empty";
		   flag=false;

		}
		else if(ph==0){
		   
		   un=document.getElementById("msg7");
		   un.innerHTML="Product Phone Empty";
		   flag=false;

		}
		else if(pdv==0){
		   
		   un=document.getElementById("msg8");
		   un.innerHTML="Product Location Empty";
		   flag=false;

		}
		
		return flag;
	
    }
</script>


	<?php
	
	session_start();

    $u=$_SESSION["user"];
	
	  
	
		$regid=array();
		
		if($_POST){
			
			 $errors=array();
			
		if(strlen($_POST['pname'])==0){
		 $errors['error1']="Product Name Empty";
		}
		
	    if(strlen($_POST['product_category'])==0){
		 $errors['error2']="Category Empty"; 
		}
		if(strlen($_POST['quantity'])==0 ){
		 $errors['error3']="Product Quantity Empty ";
		}
		if(strlen($_POST['price_per_unit'])==0){
		 $errors['error4']="Price Empty"; 
		}
		
		if(strlen($_POST['peoduct_discribetion'])==0){
		 $errors['error5']="Description Empty"; 
		}
		if(strlen($_POST['product_division'])==0){
		 $errors['error6']="Enter Phone Number"; 
		}
		if(strlen($_POST['phone'])==0){
		 $errors['error7']="Enter Phone Number"; 
		}
		
		
			
		if(count($errors)==0)
		{	
			
			
		$product=$_POST["pname"];
		$productcategory=$_POST["product_category"];
		$quantityy=$_POST["quantity"];
		$priceperunit=$_POST["price_per_unit"];
		$peoductdiscribetion=$_POST["peoduct_discribetion"];
		$productdivision=$_POST["product_division"];
		$phone=$_POST["phone"];
		
		
		$ss=$_FILES['fileToUpload']['tmp_name'];
        $n=$_FILES['fileToUpload']['name'];



        $ar=explode("/",$_FILES['fileToUpload']['type']);
		
		//$p="scategory/"+$n;
		
		$p="scategory/"."$n";
		//$p=$n;
		
		//echo($p);
		

		//$district=$_POST["district"];
		//$typ=$_POST["typ"];
		//$mail=$_POST["mail"];
		
		
		if($ar[0]!="image"){
	       $errors['error8']="Image Type Not Supported";
		}
		else if(file_exists("scategory/".$n)){
			//echo "Filename Exists : ".$n;
			$errors['error9']="Filename Already Exist";
	
		}
		else{
	
	    include("DB.php");
		/*
		echo "<pre>";
		print_r($GLOBALS);
		echo "</pre>";*/
		
		$sq="select ID from registrationtable where User_Name='$u'";
		
		$s=getAllDataFromDB($sq);
		
		
		
		//print_r($s[0]);
		
		$rg=$s[0];
		
		$v=$rg["ID"];
		
		//echo "ABC";
		if(move_uploaded_file($ss,"scategory/".$n)){
		
		updateDB("INSERT INTO adtable(regid,product_name,product_category,quantity,price_per_unit,description,photo,phone,date,division) 
		VALUES ('$v','$product','$productcategory','$quantityy','$priceperunit','$peoductdiscribetion','$p','$phone',NOW(),'$productdivision') ");
		
		//header("Location:apppnd.php?");*/
		echo "<script type='text/javascript'>alert('Posted Successfully!')</script>";
		
		 }
		}
		
		}
		}
		
	

		
	?>



<link rel="stylesheet" type="text/css"  href="profile.css" >


<body class="main">

    <div class="container"> </div>
   <?php include "inc/user_navi_bar.php";?>
	
	
	 
	
	
	<div class="location">
	<ul>
		
		<li> <a href="" > Location </a> 
		<ul>
		     <li> <a href='userlocationresult.php?variable=Barisal' > Barisal </a> </li>
			 <li> <a href='userlocationresult.php?variable=Chittagong' > Chittagong </a> </li>
			 <li> <a href='userlocationresult.php?variable=Dhaka' > Dhaka </a> </li>
			 <li> <a href='userlocationresult.php?variable=Khulna' > Khulna </a> </li>
			 <li> <a href='userlocationresult.php?variable=Mymensingh' > Mymensingh </a> </li>
			 <li> <a href='userlocationresult.php?variable=Rangpur' > Rangpur </a> </li>
			 <li> <a href='userlocationresult.php?variable=Sylhet' > Sylhet </a> </li>
			 <li> <a href='userlocationresult.php?variable=Rajshahi' > Rajshahi </a> </li>

		   
		</ul>
		</li>
		
			 
		 
	</ul>
	</div>
	

	
	<div class="search">
		
		     <span><input type="text" name="search" id="pname" onkeyup="showHint()" placeholder="Search"></span>
		     <span><input type="submit" name="sbt1" id="srch" onclick="showHint()" value="Search"></span>
			 <span><p id="txtHint" style="border:0px solid red;"></p></span>
			 </br>
		
	</div>
	

	
	<!--div class="search">
		
		     <span><input type="text" name="search" id="pname" onkeyup="showHint()" placeholder="Search"></span>
		     <span><input type="submit" name="sbt1" id="srch" onclick="showHint()" value="Search"></span>
			 <span><p id="txtHint" style="border:0px solid red;"></p></span>
			 </br>
		
	</div>
	
	<div class="post">
		<input type="submit" name="sbt2" id="post" onclick="" value="Ad Post">

	</div>
	
	
	<div class="edit">
		<input type="submit" name="sbt3" id="editProfile" onclick="" value="Edit My Profile">

	</div-->
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	

	<form action="" class="add" method="post" name="adpost" enctype="multipart/form-data">
		<div class="pname">
			<label>Product Name:
			<input type="text"  id="pname" name="pname" onkeyup="validation()" ></label>
			<span id="msg1"></span>

		</div>
		</br>
		<div>
			<label>Product Category:
				<select id="" name="product_category" onkeyup="validation()">
					  <option value="Fish">Fish</option>
					  <option value="Fruit">Fruit</option>
					  <option value="Meat">Meat</option>
					  <option value="Mlik">Mlik</option>
					  <option value="Vegetable">Vegetable</option>
					  <option value="Rice">Rice</option>


				</select></label>
				<span id="msg2"></span>
		</div>
		</br>
		
		<div><label>Product Photo: 
		 
		<input type="file" name="fileToUpload" onkeyup="validation()">
		</label>
		
		</div>
		</br>
		
		<span id="msg3"></span>
		
		</br>
		
		<div>
		<label>Quantity:
		<input type="text"  id="pquality" name="quantity" onkeyup="validation()" ></label>
		<span id="msg4"></span>
		</div>
		</br>
		<div>
		<label>Price Per Unit:
		<input type="text"  id="pprice" name="price_per_unit" onkeyup="validation()"  ></label>
		<span id="msg5"></span>
		</div>
		</br>
		<div>
		<label>Description:
		<input type="text"  id="pdiscribetion" name="peoduct_discribetion" onkeyup="validation()" ></label>
		<span id="msg6"></span>
		</div>
		</br>
		<div>
		<label>Phone:
		<input type="text"  id="pphone" name="phone" onkeyup="validation()" ></label>
		<span id="msg7"></span>
		</div>
		</br>
		<div>
		<label>Division:
				<select id="" name="product_division" onkeyup="validation()">
					  <option value="Chittagong">Chittagong</option>
					  <option value="Rajshahi">Rajshahi</option>
					  <option value="Meat">Khulna</option>
					  <option value="Barisal">Barisal</option>
					  <option value="Dhaka">Dhaka</option>
					  <option value="Comilla">Comilla</option>


				</select></label>
				<span id="msg8"></span>
		</div>
		</br>
		
		<label><div><input type="submit" class="button" onclick="return validation()" value="Submit" /></div></label>
		
		<?php
	 
	    if(isset($errors['error1'])){
		   echo $errors['error1'];
		} 
		
		else if(isset($_SESSION["error2"])){
			echo $_SESSION["error2"];
		}
		
		else if(isset($errors['error3'])){
			 echo $errors['error3'];
		}
		else if(isset($errors['error4'])){
			 echo $errors['error4'];
		}
		else if(isset($errors['error5'])){
			 echo $errors['error5'];
		}
		
		else if(isset($errors['error6'])){
			 echo $errors['error6'];
		}
		
		else if(isset($errors['error7'])){
			 echo $errors['error7'];
		}
		else if(isset($errors['error8'])){
			 echo $errors['error8'];
		}
		else if(isset($errors['error9'])){
			 echo $errors['error9'];
		}
		
	    ?>
		

	</form>
	
	</body>
	
