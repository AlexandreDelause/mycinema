<?php
session_start();
?><!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Cinema</title>
    </head>
    <body>
      <header>
        <ul>
          <li><a href="my_cinema_index.html" title="index"><strong>Acceuil</strong></a></Li>
          <li><a href="my_cinema_search_film.php" title="recherchefilm"><strong>Rechercher un film</strong></a></Li>
          <li><a href="my_cinema_search_membre.html" title="recherchefilm"><strong>Rechercher un membre</strong></a></Li>
        </ul>
      </header>
<?php
$like = $_GET["id"];
$_SESSION['idficheperso'] = $_GET["id"];
function search()
{
  $bdd = new PDO('mysql:host=localhost;dbname=my_cinema;charset=utf8', 'root', '');
  $like = $_GET["id"];
  echo 'id fiche perso : ' . $like;
  $membre = $bdd->query("SELECT * FROM `tp_fiche_personne` LEFT JOIN `tp_membre` ON `tp_membre`.`id_fiche_perso` = `tp_fiche_personne`.`id_perso`
    WHERE `tp_fiche_personne`.`id_perso` LIKE '$like'");

  //var_dump($membre);
  while($membres = $membre->fetch())
  {
    echo "<H2 class='title'>". $membres['nom']." ".$membres['prenom'] ."</H2>";
    //echo "<p class='resum'>". $membres['id_abo']."</p><br><hr>";
    $likee = $membres['id_abo'];
  }
  $membreabo = $bdd->query("SELECT * FROM `tp_membre` LEFT JOIN `tp_abonnement` ON `tp_membre`.`id_abo` = `tp_abonnement`.`id_abo` WHERE `tp_abonnement`.`id_abo` LIKE '$likee'");
  $membreabos = $membreabo->fetch();
  $nbabo = $membreabos['id_abo'];
  if($nbabo != NULL){
  echo "<H2 class='title'>". $membreabos['nom'].": ".$membreabos['resum'] ."</H2>";
  }
  else{
    echo "Pas d'abonnement";
  }
}
search();
?>
<form method="post">
  <select name="type">
    <option value = "NULL">Supprimer</option>
    <?php
      $bdd = new PDO('mysql:host=localhost;dbname=my_cinema;charset=utf8', 'root', '');
      $abos = $bdd->query("SELECT * FROM tp_abonnement");
      foreach($abos as $abo)
      {
        echo '<option value="'.$abo["id_abo"].'">'.$abo["nom"].'</option>';
      }
    ?>
    </select>
    <input type="submit" name="form" value="Modifier Abonnement">
</form>
<?php
if(isset($_POST["type"]))
{
  $type = $_POST["type"];
  $bdd = new PDO('mysql:host=localhost;dbname=my_cinema;charset=utf8', 'root', '');
  $bdd->query("UPDATE tp_membre SET id_abo = " .$type . " WHERE id_fiche_perso = ".$like);
  header("location:membre.php?id=".$like);
}
echo "<H2 class='title'>"."Historique Membre:"."</H2>";
?>
<form action = "recherchefilmadd.php" method="post">
<input type="submit" name="form" value="Ajouter Film Historique">
</form>
<?php
$bdd = new PDO('mysql:host=localhost;dbname=my_cinema;charset=utf8', 'root', '');
$membrejoin = $bdd->query("SELECT * FROM `tp_fiche_personne` LEFT JOIN `tp_membre` ON `tp_membre`.`id_fiche_perso` = `tp_fiche_personne`.`id_perso`
  WHERE `tp_fiche_personne`.`id_perso` LIKE '$like'");
    while($membrejoins = $membrejoin->fetch())
    {
      $likeee = $membrejoins['id_membre'];
    }
$membrehist = $bdd->query("SELECT * FROM `tp_film` INNER JOIN `tp_historique_membre` ON `tp_historique_membre`.`id_film` = `tp_film`.`id_film` INNER JOIN `tp_membre` ON `tp_historique_membre`.`id_membre` = `tp_membre`.`id_membre`
WHERE `tp_historique_membre`.`id_membre` LIKE '$likeee'");
//$filmidhist = $bdd->query("SELECT * FROM")
  $idfilmhist = "";
  while($membrehists = $membrehist->fetch())
  {
  echo '<p>'.$membrehists['titre'].'</p>';
  echo '<p>'." Avis du membre pour le film ".$membrehists['titre'].": ".$membrehists['membre_avis'].'</p>';
  $idf = $membrehists['id_film'];
  echo "<a href='avisadd.php?idf=$idf'>Ajouter un avis</a>";
  }
?>
</body>
</html>
