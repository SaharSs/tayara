<?php
include('../admin/config/db.php');
session_start();
include"../header.php";
if (!isset($_SESSION['user']))
    header('location:login_user.php');
$q = "select users.* from users ";
$s = mysqli_query($c, $q);
if(isset($_GET['logout'])){
    session_unset();
    header('location:login_user.php');
}
?>
<html>
<body>
<a href="user.php?logout">Déconnexion</a>
<table class="table">
    <thead>
    <tr>
        <th scope="col">id</th>
        <th scope="col">Nom</th>
        <th scope="col">Nom d'utilisateur</th>
        <th scope="col">password</th>
        <th scope="col">email</th>
        <th scope="col">etat</th>
        <th scope="col">image</th>
        <th scope="col">adresse</th>
        <th scope="col">postcode</th>
        <th scope="col">teléphone</th>
        <th scope="col">role</th>
    </tr>
    </thead>
    <tbody>
    <?php while ($row = mysqli_fetch_assoc($s)) {
        ?>
        <tr>
            <th scope="row"><?php echo $row['id']; ?></th>
            <td><?php echo $row['name']; ?></td>
            <td><a href="envoi_mess.php?id=<?= $row['id']; ?>"><?= $row['username']; ?></a></td>
            <td><?php echo $row['password']; ?></td>
            <td><?php echo $row['email']; ?></td>
            <td><?php echo $row['etat']; ?></td>
            <td><?php echo $row['image']; ?></td>
            <td><?php echo $row['adresse']; ?></td>
            <td><?php echo $row['postcode']; ?></td>
            <td><?php echo $row['phone_number']; ?></td>
            <td><?php echo $row['role']; ?></td>
        </tr>
        <?php
    }
    ?>
    </tbody>
</table>
</body>
</html>

