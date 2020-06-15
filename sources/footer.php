<?php 
$produit = new produit;
$tab=$produit -> categorie();
?>


<footer>
	<div class="categorie">
		<div>
			<h3>Categorie</h3>
		</div>
		<div class="titre">
			<?php 
			for($j=0; $j < sizeof($tab); $j++)
             {
             	?>
             	<a class="menu" href="sous-categorie.php?type=<?php echo $tab[$j][2];?>&id=<?php  echo $tab[$j][0];?>"><?php echo $tab[$j][1];?></a>
           		<?php	
             }
			?>
		</div>
	</div>
	<div class="footer">
		<div id="mentions">
			<div>
				<a href="mentions.html">Mentions légales</a>
				<a href="contact.php">Contactez-nous</a>
			</div>
				<p>© 2020 Tous droits réservés ATComputer</p>
		</div>
	</div>
	<div class="img">
		<p>Nos magasins en France</p>
		<a href="https://www.google.fr/maps/place/Joliette,+Marseille/@43.3040531,5.3567312,15z/data=!3m1!4b1!4m5!3m4!1s0x12c9c0ed7442dacd:0x73ed2062a058ae62!8m2!3d43.3035953!4d5.3660975"><div class="map">
		</div></a>
	</div>
</footer>