<?php include("functions.php");


$produit = new produit;
$categorie= new categorie;
$user = new userpdo;

if($user -> getAllInfos()[0][6] != "admin")
{
	header('Location: index.php');
}

$tabproduits=$produit->produits();
$tab=$produit->categorie();
$tab1=$produit->sous_categorie();




if(isset($_POST['modifier']))
{

	 if($_FILES["fileToUpload"]["error"]==0)
	 {
	 	include("upload.php");
	 	$handle=opendir("../img/");
		unlink($_POST['chemin']);
	 }
	 else
	 {	
	 	$_POST['image']= $_POST['chemin'];	
	 }

	$produit->update($_POST['nom'], $_POST['categorie'], $_POST['sous_categorie'], $_POST['description'], $_POST['prix'], $_POST['image'], $_POST['hauteur'], $_POST['largeur'], $_POST['id']);

}

if(isset($_POST['ajout_produit']))
{
	?>
	<div class="uplodad">
		<?php include("upload.php");?>
	</div>
	<?php
	
	$chemin="../img/".$name;
	$_POST['image']= $chemin;
	
	
	$produit ->insert_produits($_POST['nom'], $_POST['categorie'], $_POST['sous_categorie'], $_POST['description'], $_POST['prix'],$_POST['image'], $_POST['hauteur'], $_POST['largeur']);

}

if(isset($_POST['ajout_categorie']))
{
	$categorie -> ajout_categorie($_POST['nom_categorie']);
}

if(isset($_POST['ajout_sous_categorie']))
{
	?>
	<div class="uplodad">
		<?php include("upload.php");?>
	</div>
	<?php
	
	$chemin="../img/".$name;

	$categorie -> ajout_sous_categorie($_POST['nom_sous_categorie'], $chemin, $_POST['hauteur'], $_POST['largeur']);
}


if(isset($_POST['supprimer_categorie']))
{
	$categorie ->delete_categorie($_POST['id_categorie']);
}

if(isset($_POST['supprimer_sous_categorie']))
{
	$handle=opendir("../img/");
	unlink($_POST['chemin_image_sous_categorie']);
	$categorie ->delete_sous_categorie($_POST['chemin_image_sous_categorie']);
}

if(isset($_GET['action']))
{
	$nomproduit=$produit->nomproduits($_GET['nom']);
}

if(isset($_POST['supprimer']))
{
	$produit -> delete($_POST['id']);	
}




?>
<html>
	<head>
		<title>Administration</title>
		<link href="boutique.css" rel="stylesheet">
		<meta charset="UTF-8">
	</head>
<body class="administration">

<?php include("header.php"); ?>

<div class="option">
	<form action="" method="get">
		<input name="option" type="submit" value="Ajouter un produit">
		<input name="option" type="submit" value="Ajouter Catégorie">
		<input name="option" type="submit" value="Ajouter une Sous-catégorie">
	</form>
	<form action="" method="get">
		<input name="option" type="submit" value="Supprimer ou modifier un produit">
		<input name="option" type="submit" value="Supprimer une Catégorie">
		<input name="option" type="submit" value="Supprimer une Sous-catégorie">
	</form>
</div>




	<?php

	if(isset($_GET['option']))
	{
	if($_GET['option']=="Ajouter un produit")
	{
	?>
	<div class="adminform">
		<form action="administration.php" method="post" enctype="multipart/form-data">
		<div class="form">
			<input name="nom" required type="text" placeholder="Nom du Produit">
			<input name="prix" required type="number" min="0.00" max="10000.00" step="0.01" placeholder="prix" />
		</div>
			<textarea name="description" required placeholder="description"></textarea>
			<input required type="file" name="fileToUpload" id="fileToUpload">
			<select name="categorie">
				<?php 
				for($i=0; $i < sizeof($tab); $i++)
				{
				?>	
					<option value="<?php echo $tab[$i][0];?>"><?php echo $tab[$i][1];?></option>
				<?php
				}
				?>
			</select>
			<select name="sous_categorie">
				<?php 
				for($i=0; $i < sizeof($tab1); $i++)
				{
				?>	
					<option value="<?php echo $tab1[$i][0];?> "><?php echo $tab1[$i][1];?></option>
				<?php
				}
				?>

			</select>
			<div class="taille">
				<label>Hauteur :</label>
				<input name="hauteur" required type="number" value="200">
				<label>Largeur :</label>
				<input name="largeur" required type="number" value="200">
			</div>
			<div class="choix">
				<input type="submit" name="ajout_produit">
			</div>
		</form>
	</div>
	<?php
	}
	else if($_GET['option']=="Supprimer ou modifier un produit")
	{
			?>
		<div class="adminform2">
			<form action="administration.php" method="get">	
				<select name="nom">
					
					<?php for($k=0; $k < sizeof($tabproduits); $k++)
					{
					?>
						<option><?php echo $tabproduits[$k][1];?></option>
					<?php
					}	
					?>
				</select>
					<div class="choix">
						<input type="submit" name="action" value="Valider">
					</div>
			</form>
		</div>
		<?php	
		}
		else if($_GET['option']=="Ajouter Catégorie")
		{
		?>
			<div class="adminform2">
				<form action="administration.php" method="post">
					<input required placeholder="Nom de votre catégorie" type="text" name="nom_categorie">
				<div class="choix">
					<input type="submit" name="ajout_categorie" value="Ajouter">
				</div>
				</form>
			</div>
		<?php
		}
		else if($_GET['option']=="Ajouter une Sous-catégorie")
		{
		?>
			<div class="adminform3">
				<form action="administration.php" method="post" enctype="multipart/form-data">
					<input type="text" required name="nom_sous_categorie" placeholder="Nom de votre sous-categorie">
					<input required type="file" name="fileToUpload" id="fileToUpload">
					<div class="taille">
						<label>Hauteur :</label>
						<input name="hauteur" required type="number" value="200">
						<label>Largeur :</label>
						<input name="largeur" required type="number" value="200">
					</div>
					<div class="choix">
						<input type="submit" name="ajout_sous_categorie" value="Ajouter">
					</div>
				</form>
			</div>
		<?php
		}
		else if($_GET['option']=="Supprimer une Sous-catégorie")
		{
		?>
			<div class="adminform2">
				<form action="administration.php" method="post">
					<select name="chemin_image_sous_categorie">
					
					<?php for($p=0; $p < sizeof($tab1); $p++)
					{
					?>
						<option value="<?php echo $tab1[$p][2];?>"><?php echo $tab1[$p][1];?></option>
						
					<?php
					}
					?>

					</select>	
					<div class="choix">
						<input type="submit" name="supprimer_sous_categorie" value="Supprimer">
					</div>
				</form>
			</div>
		<?php
		}
		else if($_GET['option']=="Supprimer une Catégorie")
		{
		?>
			<div class="adminform2">
				<form action="administration.php" method="post">
					<select name="id_categorie">
					
					<?php for($j=0; $j < sizeof($tab); $j++)
					{
					?>
						<option value="<?php echo $tab[$j][0];?>"><?php echo $tab[$j][1];?></option>
						
					<?php
					}
					?>

					</select>	
					<div class="choix">
						<input type="submit" name="supprimer_categorie" value="Supprimer">
					</div>
				</form>
			</div>
		<?php
		}
		}	
		if(isset($_GET['nom']))
				{
				?>
			<div class="adminform">
				<form action="administration.php" method="post" enctype="multipart/form-data">
				<div class="form">
					<input  name="id" type="hidden" value="<?php echo $nomproduit[0][0];?>">
					<input  name="chemin" type="hidden" value="<?php echo $nomproduit[1][2];?>">
					<input name="nom" required type="text" placeholder="Nom du Produit" value="<?php echo $nomproduit[0][1];?>">
					<input name="prix" required type="number" min="0.00" max="10000.00" step="0.01" placeholder="prix" value="<?php echo $nomproduit[0][5]; ?>"/>
				</div>
					<textarea name="description" required placeholder="description"><?php echo $nomproduit[0][4]; ?></textarea>
					<label>Image actuelle :</label>
					<img width="120px" src="<?php echo $nomproduit[1][2];?>">
					<label>Changer image :</label>
					<input type="file" name="fileToUpload" id="fileToUpload">

					<select name="categorie">

						<?php 
						for($i=0; $i < sizeof($tab); $i++)
						{
						?>	
							<option value="<?php echo $tab[$i][0];?>"><?php echo $tab[$i][1];?></option>
						<?php
						}
						?>

					</select>
					<select name="sous_categorie">
						<?php 
						for($i=0; $i < sizeof($tab1); $i++)
						{
						?>	
							<option value="<?php echo $tab1[$i][0];?> "><?php echo $tab1[$i][1];?></option>
						<?php
						}
						?>

					</select>

					<div class="taille">
						<label>Hauteur :</label>
						<input name="hauteur" required type="number" value="<?php echo $nomproduit[1][3];?>">
						<label>Largeur :</label>
						<input name="largeur" required type="number" value="<?php echo $nomproduit[1][4];?>">
					</div>
					<div class="choix">
						<input type="submit" value="Modifier "name="modifier">
						<input type="submit" value="Supprimer" name="supprimer">
					</div>
				</form>
			</div>
				<?php
				}
				?>
	
	
	


<?php include("footer.php");?>

</body>
</html>