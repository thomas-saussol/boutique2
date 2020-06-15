<?php include("functions.php");?>

<html>

<head>
	<title>Accueil de la boutique</title>
	<link href="boutique.css" rel="stylesheet">
	<meta charset="UTF-8">


</head>

<body class="accueil">
	<?php include("header.php");

	$produit= new produit;
	$commande= new panier;
	$dernier_ajout= $produit->nouveautees();
	$ventes=$commande->top_vente();

	?>

<h1>Nos nouveautés</h1>
<div class="dernier_ajout">

	<?php 
	if(sizeof($dernier_ajout) > 5)
	{
		for($i=0; $i < 5; $i++)
		{
			?>
			<div>
				<h2><?php echo $dernier_ajout[$i][1];?></h2>
				<a href="description.php?id=<?php echo $dernier_ajout[$i][2];?>"><img width="200px" src="<?php echo $dernier_ajout[$i][0];?>"></a>
			</div>
			<?php
		}
	}
	else
	{
		for($i=0; $i < sizeof($dernier_ajout); $i++)
		{
			?>
			<div>
				<h2><?php echo $dernier_ajout[$i][1];?></h2>
				<a href="description.php?id=<?php echo $dernier_ajout[$i][2];?>"><img width="200px" src="<?php echo $dernier_ajout[$i][0];?>"></a>
			</div>
			<?php
		}
	}
	?>

</div>
<h1>Nos dernières ventes</h1>
<div class="dernier_ajout">

	<?php 
	if(sizeof($ventes) > 5)
	{
		$tabid[]=$ventes[0][2];
		for($i=0; $i < 5; $i++)
		{
			$nbr=0;
			if($i > 0)
			{
				for($j=0; $j < sizeof($tabid); $j++)
				{
					if($tabid[$j] == $ventes[$i][2])
					{
						$nbr++;
					}
				}
				if($nbr == 0)
				{
					 array_push($tabid, $ventes[$i][2]);

					?>
					<div>
						<h2><?php echo $ventes[$i][0];?></h2>
						<a href="description.php?id=<?php echo $ventes[$i][2];?>"><img width="200px" src="<?php echo $ventes[$i][1];?>"></a>
					</div>
					<?php
				}
			}
			else
			{
			?>
			<div>
				<h2><?php echo $ventes[$i][0];?></h2>
				<a href="description.php?id=<?php echo $ventes[$i][2];?>"><img width="200px" src="<?php echo $ventes[$i][1];?>"></a>
			</div>
			<?php
			}
		}
	}
	else
	{
		$tabid[]=$ventes[0][2];
		for($i=0; $i < sizeof($ventes); $i++)
		{
			$nbr=0;
			if($i > 0)
			{
				for($j=0; $j < sizeof($tabid); $j++)
				{
					if($tabid[$j] == $ventes[$i][2])
					{
						$nbr++;
					}
				}
				if($nbr == 0)
				{
					 array_push($tabid, $ventes[$i][2]);

					?>
					<div>
						<h2><?php echo $ventes[$i][0];?></h2>
						<a href="description.php?id=<?php echo $ventes[$i][2];?>"><img width="200px" src="<?php echo $ventes[$i][1];?>"></a>
					</div>
					<?php
				}
			}
			else
			{
			?>
			<div>
				<h2><?php echo $ventes[$i][0];?></h2>
				<a href="description.php?id=<?php echo $ventes[$i][2];?>"><img width="200px" src="<?php echo $ventes[$i][1];?>"></a>
			</div>
			<?php
			}
		}
	}

	?>

</div>
	<?php include("footer.php");?>
 </body>
</html>