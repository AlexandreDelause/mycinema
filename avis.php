<?php
session_start();
$like = $_SESSION['idficheperso'];
$idfilm = $_SESSION['idfilm'];
$avistxt = $_POST['keywords'];
var_dump($idfilm);
var_dump($like);
var_dump($avistxt);
$bdd = new PDO('mysql:host=localhost;dbname=my_cinema;charset=utf8', 'root', '');
$recupidmembre = $bdd->query("SELECT * FROM `tp_fiche_personne` LEFT JOIN `tp_membre` ON `tp_membre`.`id_fiche_perso` = `tp_fiche_personne`.`id_perso`
  WHERE `tp_fiche_personne`.`id_perso` LIKE '$like'");
while($recupidmembres = $recupidmembre->fetch())
{
  $idmembre = $recupidmembres['id_membre'];
}
var_dump($idmembre);
$bdd->query( "UPDATE tp_historique_membre SET membre_avis = '$avistxt' WHERE id_membre = $idmembre AND id_film = $idfilm");
header("location:membre.php?id=".$like);
?>
