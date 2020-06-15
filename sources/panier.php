<?php include("functions.php");?>
<html>
	<head>
		<title>Mon panier</title>
		<link href="boutique.css" rel="stylesheet">
		<meta charset="UTF-8">
	</head>
<body>


	<?php include("header.php"); ?>
	<?php $panier = new panier; ?>


<!-- Supprimer du panier -->

<?php

	if(!isset($_SESSION['login']))
	{
		header('Location: connexion.php');
	}

	if(isset($_POST['suppr']))
	{
		$panier ->delete($_POST['produit']);
	}

	
	$monpanier=$panier ->  select_panier();


if(sizeof($monpanier) == 0)
{
?>
	<h1 class="panier_vide">Oopss, votre panier est vide !</h1>
	<div class="image_bonhomme">
		<img width="300px;" src="../img/bonhomme.png">
	</div>
<?php
}
else
{
?>
	<div class="infos_panier">
		<table>
				<tr>
					<th>Image produit</th>
					<th>Nom du produit</th>
					<th>Quantité</th>
					<th>Prix</th>
					<th>Supprimer</th>
				</tr>

			<?php
			$a=0;
			$tab_panier=[];
			for($i=0; $i < sizeof($monpanier); $i++)
			{
				?>
				<tr>
					<!-- Image produit -->
					<td><img width="80px" src="<?php echo $monpanier[$i][7];?>"></td>
					<!-- Nom du produi -->
					<td><?php echo $monpanier[$i][11];?></td>
					<!-- Quantité produit -->
					<td><?php echo $monpanier[$i][3];?></td>
					<!-- Prix -->
					<td><?php echo $monpanier[$i][4]*$monpanier[$i][3]. " €";?></td>
					<!-- Calcul prix total du panier -->
					<?php $a=$a+$monpanier[$i][4]*$monpanier[$i][3];?>
					<!-- Supprimer élément -->
					<td>
						<form class="corbeille" method="post" action="">
							<input type="hidden" name="produit" value="<?php echo $monpanier[$i][0]; ?>">
							<input type="submit" value="" name="suppr">
						</form>
					</td>
				</tr>
			<?php
			}
			?>
		</table>
	</div>
	<div class="prix_total">
		<div class="valid_panier">
			<div><?php echo "Prix total : ".$a. " €"; ?></div>
			<form method="post" action="information.php">
				<input type="submit" name="valider" value="Valider mon panier">
			</form>
		</div>
	</div>
<?php
}


	include("footer.php");?>
</body>
</html>