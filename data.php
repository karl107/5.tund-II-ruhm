<?php
	
	require("functions.php");
	
	
	//kui ei ole kasutaja id'd
	
	if(!isset ($_SESSION["userId"])){
	
		//suunan sisselogimise lehele 
		header("Location: logi.php");
		
	}

	//kui on ?logout aadressireal siis login välja
	if(isset($_GET["logout"])){
		session_destroy();
		header("Location: logi.php");
	}

	
	$msg="";
	if(isset($_SESSION["message"])){
		$msg=$_SESSION["message"];
		
		//Üks kord näitab, siis pärast värskendamist ei näita
		unset($_SESSION["message"]);
	}
	
	if(isset($_POST["plate"])&&
	isset($_POST["color"])&&
	!empty($_POST["plate"])&&
	!empty($_POST["color"])
	){
		saveCar($_POST["plate"], $_POST["color"]);
	}
		
	
?>
<h1>Data</h1>





<?=$msg;?>

<p>Tere tulemast <?=$_SESSION["userEmail"];?>!
<a href="?logout=1">Logi välja</a>
</p>



<form method="POST">

<h2>Salvesta auto</h2>



<input name="plate" placeholder="123ABC" type="text">
<br><br>
<input name="color" type="color">
<br><br>
<input type="submit" value="Salvesta">

</form>


