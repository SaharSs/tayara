<?php
include "../admin/config/db.php";
session_start();
if (!isset($_SESSION['user']))
    header('location:login_user.php');
$q = "select * from annonce where a_id='{$_SESSION['user']['id']}'";
$s = mysqli_query($c, $q);
$count = mysqli_num_rows($s);
?>
<html>
<head>
    <link rel="stylesheet" href="../admin/css/bootstrap.min.css">
    <link rel="stylesheet" href="../admin/css/all.min.css">
</head>
<body>
<table class="table">
    <thead>
    <tr>
        <th scope="col">id</th>
        <th scope="col">pid</th>
        <th scope="col">texte_annonce</th>
        <th scope="col">prix</th>
        <th scope="col">image</th>
        <th scope="col">adresse</th>
        <th scope="col">phone_number</th>
    </tr>
    </thead>
    <tbody>
    <?php if ($count > 0) {
        while ($row = mysqli_fetch_assoc($s)) {?>
            <tr>
                <th scope="row"><?php echo $row['id']; ?></th>
                <td><?php echo $row['pid']; ?></td>
                <td><?php echo $row['texte_annonce']; ?></td>
                <td><?php echo $row['prix']; ?></td>
                <?php
                $t = "select image from image_an where i_id='{$row['id']}' ";
                $h = mysqli_query($c, $t);
                $row1 = mysqli_fetch_assoc($h);
                ?>
                <td><?php echo $row1['image']; ?></td>
                <td><?php echo $row['adresse']; ?></td>
                <td><?php echo $row['phone_number']; ?></td>
                <td>
                    <a href="update_an.php?id=<?= $row['id']; ?>"><i class="fas fa-edit"></i></a>
                    <a href="supp_an.php?id=<?= $row['id']; ?>"><i class="fas fa-trash"></i></a>

                </td>
            </tr>
            <?php
        }
    }
    ?>
    </tbody>
</table>
<script src="../admin/js/jquery.min.js"></script>
<script src="../admin/js/bootstrap.min.js"></script>
</body>
</html>
        
