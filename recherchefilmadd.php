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
      <form action="filmadd.php" method="post">
        <input type="text" name="keywords" placeholder="rechercher le film a ajouter">
        <input type="submit" name="form" value="Rechercher">
      </form>
      </body>
</html>
