
<html>
    <head>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <title>Authentification</title>    
    
    
    </head>
    <body>
    
      <div class="container">
            <form action="queries/submit_login.php" method="post">
  <div class="form-group">
    <label for="username">Nom d'utilisateur</label>
    <input type="text" class="form-control" id="username" name="username" placeholder="nom d'utilisateur">
  </div>
  <div class="form-group">
    <label for="password">Mot de passe</label>
    <input type="password" class="form-control" id="password" name="password" placeholder="mot de passe">
  </div>
  <button type="submit" class="btn btn-primary" name="submit">Se connecters</button>
</form>
        </div>
        <script src="js/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
    </body>
</html>