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
      <form method="post">
      <input type="submit" name="form" value="Ajouter ce Film a l'historique">
      </form>
    </body>
</html>
<?php
$like = $_SESSION['idficheperso'];
var_dump($like);
$bdd = new PDO('mysql:host=localhost;dbname=my_cinema;charset=utf8', 'root', '');
$recupidmembre = $bdd->query("SELECT * FROM `tp_fiche_personne` LEFT JOIN `tp_membre` ON `tp_membre`.`id_fiche_perso` = `tp_fiche_personne`.`id_perso`
  WHERE `tp_fiche_personne`.`id_perso` LIKE '$like'");
var_dump($recupidmembre);
while($recupidmembres = $recupidmembre->fetch())
{
  $idmembre = $recupidmembres['id_membre'];
}
var_dump($idmembre);
$idfilm = $_GET['id'];
var_dump($idfilm);
$bdd->query("INSERT INTO `tp_historique_membre` (`id_membre`, `id_film`, `date`)
VALUES (".$idmembre.", ".$idfilm.", NOW())");

header("location:membre.php?id=".$like);
?>
