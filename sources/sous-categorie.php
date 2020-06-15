<html>
	<head>
		<title>Accueil de la boutique</title>
		<link href="boutique.css" rel="stylesheet">
		<meta charset="UTF-8">
	</head>

<body>
<?php include("functions.php");?>
<?php include("header.php");?>

<div class="sous_categorie">
	<div>
		<?php
		$produit = new produit;
		$tab=$produit -> categorie();
		$tab1=$produit -> sous_categorie();
		

			for($i=0; $i < sizeof($tab1); $i++)
			{
			?>
			<a href="produits.php?type=<?php echo $_GET['type'];?>&id=<?php  echo $_GET['id'];?>&marque=<?php echo $tab1[$i][1]; ?>&id2=<?php echo $tab[$i][0];?>"><img width="<?php echo $tab1[$i][4];?>" height="<?php echo $tab1[$i][3];?>" src="<?php echo $tab1[$i][2];?>"></a>
			<?php
			}
			?>
	</div>
</div>


<?php include("footer.php");?>

</body>




