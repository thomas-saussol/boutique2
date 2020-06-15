<?php

	$imagenom=$produit->genererChaineAleatoire(10);

	$target_dir = "../img/";
	$name=$imagenom.".jpg";

	$target_file = $target_dir . basename($name);
	$uploadOk = 1;
	$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
	// Check if image file is a actual image or fake image
	


	    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
	    if($check !== false) {
	        $uploadOk = 1;
	    } else {
	        $uploadOk = 0;
	    }

	    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
 	   } else {
 	   }

 	   $chemin="../img/".$name;
	   $_POST['image']= $chemin;
?>