<?php
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
function search()
{
  $bdd = new PDO('mysql:host=localhost;dbname=my_cinema;charset=utf8', 'root', '');
  $keywords = explode(' ', $_POST['keywords']);
  $like = "";

  foreach($keywords as $keyword)
  {
    $like.= " titre LIKE '%".$keyword."%' OR";
  }
    $like = substr($like, 0, strlen($like) - 3);
    $films = $bdd->query("SELECT * FROM tp_film WHERE ".$like );
      while ($data = $films->fetch())
      {
        echo "<H2 class='title'>". $data['titre'] ."</H2>";
        echo "<p class='resum'> Résumé du film : ". $data['resum']."</p><br><hr>";
      }
    return;
}
search();
?>
</body>
</html>
