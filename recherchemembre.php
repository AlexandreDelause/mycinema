<!DOCTYPE html>
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
function searchid()
{
  $bdd = new PDO('mysql:host=localhost;dbname=my_cinema;charset=utf8', 'root', '');
  $keywords = explode(" ", $_POST['keywords']);
  $like = "";

  foreach($keywords as $keyword)
  {
    $like.= " nom LIKE '%".$keyword."%' OR prenom LIKE '%".$keyword."%' OR";
  }
    $like = substr($like, 0, strlen($like) - 3);
    $membres = $bdd->query("SELECT * FROM tp_fiche_personne WHERE ".$like);
      while ($data = $membres->fetch())
      {
        echo '<a href="membre.php?id='.$data["id_perso"].'"><div class="membres">'.$data["nom"] . ' ' . $data["prenom"].'</div><br/></a>';
      }
  return;
}
searchid();
?>
</body>
</html>
