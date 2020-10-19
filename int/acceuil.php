<?php
include "../admin/config/db.php";
session_start();
if (!isset($_SESSION['user']))
    header('location:login_user.php');
?>
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
                        echo "<img src='images/avatar/" . $_SESSION['user']['image'] . "' style='width:20px; border-radius:60%'/>";
                        echo $_SESSION['user']['name'];
                        ?>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="add_user1.php">inscription</a>
                        <a class="dropdown-item" href="login_user.php">connecté</a>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>
<?php
if (isset($_POST['rechercher']) AND !empty($_POST['recherche'])) {
    $m = htmlspecialchars($_POST['recherche']);
    $q = "SELECT annonce.id,annonce.prix,(SELECT image FROM image_an WHERE i_id=annonce.id LIMIT 1)as image FROM annonce WHERE annonce.cas=1 AND annonce.titre LIKE '%".$m."%'";
    echo "Résultat de la recherche de : $m <a href='acceuil.php'>Annuler la recherche</a>";
}else {
    $q = "SELECT annonce.id,annonce.prix,(SELECT image FROM image_an WHERE i_id=annonce.id LIMIT 1)as image FROM annonce WHERE annonce.cas=1";
}
$r = mysqli_query($c, $q);
while ($row = mysqli_fetch_assoc($r)) {
        echo '<div class="text-center"><div><img src="images/avatar1/'. $row['image'].'" width="100" style="border-radius:50%"/></div><div><span>'.$row['prix'].'</span></div><div><a href="voir.php?id='.$row['id'].'">voir</a></div></div>';
}
?>
<script src="../admin/js/jquery.min.js"></script>
<script src="../admin/js/bootstrap.min.js"></script>
</body>
</html>
