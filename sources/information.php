<?php include("functions.php");?>
<html>
	<head>
		<title>Information</title>
		<link href="boutique.css" rel="stylesheet">
		<meta charset="UTF-8">
	</head>
<body>
	<?php 
	include("header.php"); 


	if(!isset($_SESSION['login']))
	{
		header('Location: connexion.php');
	}
	

	$user = new userpdo;
	$panier = new panier;
	$monprofil=$user->getAllInfos();


	if(isset($_POST['valider_information']))
	{
		$panier->achat($_POST['adresse']);
	}
?>

<div class="form_information">
	<form action="" method="post">
	<fieldset>
		<legend>Adresse de livraison</legend>
			<input name="nom" required type="text" placeholder="Nom *" value="<?php echo $monprofil[0][2];?>">
			<input name="prenom"required type="text" placeholder="Prénom *" value="<?php echo $monprofil[0][3];?>">
			<input name="email" required type="email" placeholder="Email *" value="<?php echo $monprofil[0][4];?>">
			<input name="adresse" minlength="30" required type="text" placeholder="Votre adresse de livraison *">
	</fieldset>
	<fieldset class="cb">
		<legend>Moyen de paiement (Simulation, non requis)</legend>
	<div class="moyen_paiement">
		<div class="visa">
			<input checked="true" type="radio" id="visa" name="cb" value="visa">
			<div></div>
  			<label for="visa">VISA</label>
  		</div>
  		<div class="mastercard">
  			<input type="radio" id="mastercard" name="cb" value="mastercard">
  			<div></div>
  			<label for="mastercard">Mastercard</label>
  		</div>
  		<div class="paypal">
  			<input type="radio" id="paypal" name="cb" value="paypal">
  			<div></div>
  			<label for="paypal">Paypal</label>
  		</div>
  	</div>
  	<div class="info_cb">
  		<input type="number" value="4973559965849847" placeholder="N° de carte" name="num_carte">
  		<input type="text" value="Toto" name="name_cb" placeholder="Nom du porteur *">
  		<input type="number" value="845" placeholder="Code sécurité *" min="100" max="999" name="code">
  	</div>

	</fieldset>
		<input name="valider_information" type="submit" value="Acheter">
	</form>
</div>


	<?php include("footer.php");?>
</body>
</html>