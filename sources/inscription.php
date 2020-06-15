<!-- ------- PARTIE PHP - FONCTION REGISTER ------- -->
<?php include("functions.php");


if(isset($_SESSION['login']))
{
	header('location: index.php');
}

?>

<!-- ---------------------------------------------- -->
<!-- ---------- FORMULAIRE HTML-------------------- -->

<html>
	<head>
		<link href="boutique.css" rel="stylesheet">
	</head>
	<body>



		<?php include("header.php");?>

<h1 class="log_titre">Inscrivez-vous !</h1>
<div id="form_log2">
		<form action="inscription.php" method="post">
		<?php
			if(isset($_POST['signin']))
			{
				$user = new userpdo;
				$user_sign=$user->register($_POST['login'], $_POST['lastname'],$_POST['firstname'],$_POST['email'],$_POST['pass1'], $_POST['pass2']);
				if($user_sign=="ok")
				{
					header('location: connexion.php');
				}
				else
				{
					echo $user_sign;
				}
			}
			?>
			<input type="text" name="login" required placeholder="Login">
			<input type="text" name="lastname" required placeholder="Nom">
			<input type="text" name="firstname" required placeholder="Prénom">
			<input type="email" name="email" required placeholder="Email">
			<input type="password" name="pass1" required placeholder="Mot de passe">
			<input type="password" name="pass2" required placeholder="Confirmer votre mot de passe">
			<input type="submit" name="signin" required value="S'inscrire">
		</form>
</div>

<?php include("footer.php");?>
	</body>
</html>

<!-- --------------------------------------------- -->
