




<html>
<head>
    <link rel="stylesheet" href="../admin/css/bootstrap.min.css">
    <link rel="stylesheet" href="../admin/css/all.min.css">
    <title>acceuil</title>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <div class="container">
            <ul class="navbar-nav ml-auto">
                <li>
                    <form method="POST" action="">
                        Recherchez
                        <input type="text" name="recherche">
                        <input type="submit" name="rechercher" value="recherche">
                    </form>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="#">acceuil </a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                       data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <?php
						if (isset($_SESSION['user']))
						{
                        echo "<img src='images/avatar/" . $_SESSION['user']['image'] . "' style='width:20px; border-radius:60%'/>";
                        echo $_SESSION['user']['name'];
						}
                        ?>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="add_user1.php">inscription</a>
                        <a class="dropdown-item" href="login_user.php">connecté</a>
                    </div>
                </li>
			  <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                       data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">panier
                     </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                      <a class="dropdown-item" href="#">0produit</a>
                        
                    </div>
                </li>		
            </ul>
        </div>
	
	
	
	</div>
</nav>
	<script src="../admin/js/jquery.min.js"></script>
<script src="../admin/js/bootstrap.min.js"></script>
</body>
</html>

