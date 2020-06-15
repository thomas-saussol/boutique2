<?php include("functions.php");?>
<html>
	<head>
		<title>Commande</title>
		<link href="boutique.css" rel="stylesheet">
		<meta charset="UTF-8">
	</head>
<body>
	<?php include("header.php"); ?>

	<?php

	if(!isset($_SESSION['login']))
	{
		header('Location: connexion.php');
	}
	
	$panier = new panier;

	if(isset($_POST['supprimer_commande']))
	{
		$panier -> delete_commande($_POST['produit_suppr']);
	}

	 
	
	$ma_commande=$panier ->select_commande();

	date_default_timezone_set('Europe/Paris');
	$date=date("F j, Y, g:i a"); 

	$date_actuelle=date_create($date);
	
	
	


if(sizeof($ma_commande) == 0)
{
?>

<div class="visite_boutique">
	<h1>Aucune commande passée</h1>
	<div>
		<a href="produits.php"><button>Visitez notre boutique</button></a>
	</div>
</div>
<?php
}
else
{
?>

<div class="infos_commande">
		<table>
				<tr>
					<th>Produit acheté</th>
					<th>Nom du produit</th>
					<th>Quantité</th>
					<th>Prix</th>
					<th>Date d'achat</th>
					<th>Adresse de livraison</th>
					<th>Annuler ma commande</th>
				</tr>
	<?php
	$a=0;
	for($i=0; $i < sizeof($ma_commande); $i++)
	{
		$date = date_create($ma_commande[$i][5]);
	?>
		<tr>
			<!-- Image produit -->
			<td><img width="80px" src="<?php echo $ma_commande[$i][9];?>"></td>
			<!-- Nom du produi -->
			<td><?php echo $ma_commande[$i][13];?></td>
			<!-- Quantité produit -->
			<td><?php echo $ma_commande[$i][3];?></td>
			<!-- Prix -->
			<td><?php echo $ma_commande[$i][4]*$ma_commande[$i][3]. " €";?></td>
			<!-- Date d'achat -->
			<?php setlocale(LC_TIME, "fr_FR");?>
			<td><?php echo strftime("%A %d %B", strtotime($ma_commande[$i][5]));
			echo '<br>'; 
			echo strftime("%G à %H:%M:%S", strtotime($ma_commande[$i][5]));?>			
			</td>
			<!-- Adresse de livraison -->
			<td><?php echo $ma_commande[$i][6];?></td>
			<!-- Supprimer élément -->
			<?php 
			$date_bdd=date_create($ma_commande[$i][5]);
					
			if(date_timestamp_get($date_actuelle) - date_timestamp_get($date_bdd) > 86400)
			{
			?>
				<td>Délai dépassé (24h)</td>
			<?php
			}
			else
			{
			?>
			<td>
				<form class="corbeille" method="post" action="">
					<input type="hidden" name="produit_suppr" value="<?php echo $ma_commande[$i][0]; ?>">
					<input type="submit" value="" name="supprimer_commande">
				</form>
			</td>
			<?php
			}
			?>
			<!-- Calcul prix total de la commande -->
			<?php $a=$a+$ma_commande[$i][4]*$ma_commande[$i][3];?>
		</tr>
	<?php
	}
	?>
	</table>
</div>
<div class="prix_commande">
			<div><?php echo "Prix total : ".$a. " €"; ?></div>
</div>

<?php
}
?>


	<?php include("footer.php");?>
</body>
</html>