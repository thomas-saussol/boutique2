<?php include("functions.php");?>


<html>
	<head>
		<title>Description produit</title>
		<link href="boutique.css" rel="stylesheet">
		<meta charset="UTF-8">
	</head>
<body>

<?php 
$produit = new produit();
$avis = new commentaire();
$user= new userpdo();
$description_produit=$produit -> descriptionproduit();
$infos=$user->getAllInfos();



?>

<?php include("header.php");

if(isset($_POST['valider']))
{
	$panier = new panier();
	$panier -> insert_panier($_GET['id'], $_POST['number_product'], $description_produit[3]);
}

if(isset($_POST['ajout_commentaire']))
{
	
	$avis -> insert_avis($_POST['avis'], $_GET['id']);
}

if(isset($_POST['supprimer_avis']))
{

	$avis -> delete_avis($_POST['produit_suppr']);
}

$avis_produits=$avis->select_avis($_GET['id']);





if($description_produit==false)
{
	header('Location: index.php');
}
?>

<div class="infos_produit">
	<div class="image_produit">
		<img width="250px" src="<?php echo $description_produit[0];?>">
	</div>
	<div class="detail_produit">
		<div class="nom_produit">
			<h1><?php echo $description_produit[1];?></h1>
			<h2><?php echo $description_produit[3]." €";?></h2>

		</div>
		<div class="description_produit">
			<?php echo $description_produit[2];?>
		</div>
	</div>
	<div class="ajout_panier">
		<form action="description.php?id=<?php echo $_GET['id'];?>" method="post">
			<div>
				<label>Quantité : </label>
				<input type="number" value="1" name="number_product">
			</div>
				<input type="submit" name="valider" value="">
		</form>
	</div>
</div>
<div class="avis_produit">
	<div class="box_avis">
		<h1>Avis clients</h1>
			
			<?php for($l=0; $l < sizeof($avis_produits); $l++)
			{
			?>
				<div class="avis_clients">
					<div class="nom_heure">
						<div>
						<?php echo $avis_produits[$l][1]; ?>
						</div>
						<div>
						<?php echo $avis_produits[$l][3]; ?>
						</div>
					</div>
					<div>
					<?php echo $avis_produits[$l][2]; ?>
					</div>

					<?php 
					if(isset($_SESSION['login']))
					{
					if($infos[0][0] ==  $avis_produits[$l][4] || $infos[0][6]=="admin")
					{
					?>
					
					<div class="corbeille_avis">
						<form method="post" action="">
							<input type="hidden" name="produit_suppr" value="<?php echo $avis_produits[$l][0]; ?>">
							<input class="supprimer_avis" type="submit" value="" name="supprimer_avis">
						</form>
					</div>
					<?php
					}
					}
					?>
				</div>
			<?php
			}

			if(isset($_SESSION['login']))
			{
			?>
			<form class="form_avis" method="post" action="">
				<textarea name="avis" placeholder="Laissez un avis..."></textarea>
				<input type="submit" name="ajout_commentaire" value="Ajouter">
			</form>
			<?php
			}
			?>
</div>
</div>













<?php include("footer.php");?>

</body>
</html>