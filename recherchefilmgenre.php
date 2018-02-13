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
      function search()
      {
        $bdd = new PDO('mysql:host=localhost;dbname=my_cinema;charset=utf8', 'root', '');
        $like = $_POST['type'];
        $genre = $bdd->query("SELECT * FROM `tp_film` LEFT JOIN `tp_genre` ON `tp_film`.`id_genre` = `tp_genre`.`id_genre` WHERE `tp_genre`.`nom` LIKE '$like'");
        $genres = $genre->fetchAll();
        foreach($genres as $value)
        {
          ?><meta charset="utf-8" /><?php
          echo "<H2 class='title'>". $value['titre'] ."</H2>";
          echo "<p class='resum'> Résumé du film : ". $value['resum']."</p><br><hr>";
        }
      }
      search();
      ?>
    </body>
</html>
