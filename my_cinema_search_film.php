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
      <form action="recherchefilmtitre.php" method="post">
        <input type="text" name="keywords" placeholder="rechercher films par titres">
        <input type="submit" name="form" value="Rechercher">
      </form>
        <strong>Rechercher films par genre</strong>
      <form action="recherchefilmgenre.php" method="post">
        <select name="type">
          <option value = "NULL">Aucun</option>
        <?php
          $bdd = new PDO('mysql:host=localhost;dbname=my_cinema;charset=utf8', 'root', '');
          $genres = $bdd->query("SELECT * FROM tp_genre");
          foreach($genres as $genre)
          {
            echo '<option value="'.$genre["nom"].'">'.$genre["nom"].'</option>';
          }
        ?>
        </select>
        <input type="submit" name="form" value="Rechercher">
      </form>
      <strong>Rechercher films par distributeurs</strong>
    <form action="recherchefilmdistri.php" method="post">
      <select name="typetwo">
        <option value = "NULL">Aucun</option>
        <?php
          $bdd = new PDO('mysql:host=localhost;dbname=my_cinema;charset=utf8', 'root', '');
          $distris = $bdd->query("SELECT * FROM tp_distrib");
          foreach($distris as $distri)
          {
            echo '<option value="'.$distri["nom"].'">'.$distri["nom"].'</option>';
          }
        ?>
        </select>
        <input type="submit" name="form" value="Rechercher">
    </form>
    </body>
</html>
