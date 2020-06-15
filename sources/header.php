<html lang="fr" dir="ltr">
<head>
  <link rel="stylesheet" href="boutique.css">
</head>


<header>

<nav>
  <ul>
   
<?php

$produit = new produit;
$user = new userpdo;
$produit -> categorie();
$produit -> sous_categorie();


if(isset($_POST['deco']))
{
  $user->disconnect();
} 
?>

<?php $tab=$produit -> categorie();?>
<?php $tab1=$produit -> sous_categorie();?>
  <li>
      <a class="menu" href="produits.php">Boutique</a>
      <ul>
            <li>
                <a class="menu" href="index.php">Accueil</a>
            </li>
              <?php
              for($j=0; $j < sizeof($tab); $j++)
              {
                ?>
                <li>
                  <a class="menu" href="sous-categorie.php?type=<?php echo $tab[$j][2];?>&id=<?php  echo $tab[$j][0];?>"><?php echo $tab[$j][1];?></a>
                    <ul>
                <?php 
                  for($i=0; $i < sizeof($tab1); $i++)
                  {
                    ?>
                    <li>
                      <a class="menu" href="produits.php?type=<?php echo $tab[$j][2];?>&id=<?php echo $tab[$j][0];?>&marque=<?php  echo $tab1[$i][1];?>&id2=<?php echo $tab[$i][0];?>"> <?php echo $tab1[$i][1];?></a>
                    </li>
                  <?php
                  }
                  ?>
                  </ul>
              <?php
              }
              ?>
            </li>
      </ul>
    </li>

    <?php if(isset($_SESSION['login']))
    {
    ?>
    <li>
      <a href=""><div class="logoprofilhover"></div></a>  
        <ul>
          <li>
            <a class="menu" href="profil.php">Mon profil</a>
          </li>
          <li>
            <a class="menu" href="commande.php">Mes commandes</a>
          </li>

          <?php 
          $monprofil=$user->getAllInfos();
          if($monprofil[0][6] == "admin")
          {
          ?>
          <li>
            <a class="menu" href="administration.php">Administration</a>
          </li> 
          <?php
          }
          ?>

        </ul>
   </li>
   <li class="logo_responsive">
      <a href="index.php"><div class="logohover"></div></a>      
   </li>
   <li>
      <a href="panier.php"><div class="logopanierhover"></div></a>
  </li>
  <li>
      <form class="disconnect" method="post" action="" >
        <input name="deco" type="submit" value="Déconnexion">
      </form>
  </li>
<?php 
}
else
{
?>
<li>
      <a href="contact.php">Contactez-nous</a>  
  </li>
  <li class="logo_responsive">
       <a href="index.php"><div class="logohover"></div></a>      
  </li>
   <li>
      <a href="inscription.php">Inscription</a>
  </li>
  <li>
      <a href="connexion.php">Connexion</a>
  </li>
<?php 
}
?>
</ul>

</nav>
</header>

</html>
