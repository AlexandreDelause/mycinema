<?php
session_start();
$_SESSION['idfilm'] = $_GET['idf'];
?>
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
      <form action = "avis.php" method="post">
        <input type="text" name="keywords" placeholder="Ajouter un avis">
        <input type="submit" name="form" value="Ajouter">
      </form>
<?php
?>
