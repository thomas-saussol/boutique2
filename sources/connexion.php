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
		<title>Connexion</title>
		<link href="boutique.css" rel="stylesheet">
	</head>
<body>

		<?php include("header.php");?>

<h1 class="log_titre">Connectez-vous !</h1>
<div id="form_log">	

			<form action="" method="post">
			<?php			
				if(isset($_POST['connect']))
				{
					$user = new userpdo;
					$userconnect= $user->connect($_POST['login'], $_POST['password']);
					if($userconnect=="ok" )
					{
						header('location: index.php');
					}
					else
					{
						echo $userconnect;
					}
				}
			?>
				<input type="text" name="login" required placeholder="Login">
				<input type="password" name="password" required placeholder="Password">
				<input type="submit" name="connect" required value="Connexion">
			</form>	
</div>

		<?php include("footer.php");?>
	</body>
</html>

<!-- --------------------------------------------- -->

