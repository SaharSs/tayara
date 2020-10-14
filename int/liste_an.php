<?php
include "../admin/config/db.php";
session_start();
if (!isset($_SESSION['user']))
    header('location:login_user.php');
if(isset($_POST['recherche']) AND !empty($_POST['recherche'])) {
    $m = htmlspecialchars($_POST['recherche']);
    $q = "SELECT * FROM annonce WHERE titre LIKE '%".$m."%' && a_id={$_SESSION['user']['id']} ";
     $r=mysqli_query($c,$q); 
         while( $row = mysqli_fetch_assoc($r)){
             ?>
<ul>
<li><?php echo $row['titre'];?></li>
</ul>
<?php
                          

         
      $q1="select image from image_an where i_id=".$row['id'];
      $r1=mysqli_query($c,$q1);

while ($row2 = mysqli_fetch_assoc($r1)) {

                 echo "<img src='images/avatar1/".$row2['image']."' width='50' style='border-radius:50%'/>"; 
    }
    }
    }

$q = "select * from annonce where a_id='{$_SESSION['user']['id']}' and cas=1";
$s = mysqli_query($c, $q);
$count = mysqli_num_rows($s);
?>
<html>
<head>
    <link rel="stylesheet" href="../admin/css/bootstrap.min.css">
    <link rel="stylesheet" href="../admin/css/all.min.css">
</head>
<body>
     
    
    <form method="POST" action=""> 
     Recherchez  
    <input type="text" name="recherche">
     <input type="submit" value="recherche"> 
     </form>
    <h4>non vendues</h4>
<table class="table">
    <thead>
    <tr>
        <th scope="col">id</th>
        <th scope="col">pid</th>
        <th scope="col">titre</th>
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
                <td><?php echo $row['titre']; ?></td>
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
                <?php
               echo "<a href='app.php?id=".$row['id']."&aid=".$row['cas']."'>désactive</a>"
               ?>

        
                                              
</td>
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
    <h4>vendues</h4>
    <?php
    $q1 = "select * from annonce where a_id='{$_SESSION['user']['id']}'  and cas=0  ";
$s1 = mysqli_query($c, $q1);
$count = mysqli_num_rows($s1);

?>
<html>
    <body>
    <table class="table">
    <thead>
    <tr>
        <th scope="col">id</th>
        <th scope="col">pid</th>
        <th scope="col">titre</th>
        <th scope="col">texte_annonce</th>
        <th scope="col">prix</th>
        <th scope="col">image</th>
        <th scope="col">adresse</th>
        <th scope="col">phone_number</th>
    </tr>
    </thead>
    <tbody>
    <?php if ($count > 0) {
        while ($row1 = mysqli_fetch_assoc($s1)) {?>
            <tr>
                <th scope="row"><?php echo $row1['id']; ?></th>
                <td><?php echo $row1['pid']; ?></td>
                 <td><?php echo $row1['titre']; ?></td>
                <td><?php echo $row1['texte_annonce']; ?></td>
                <td><?php echo $row1['prix']; ?></td>
                <?php
                $t = "select image from image_an where i_id='{$row1['id']}' ";
                $h = mysqli_query($c, $t);
                $row2 = mysqli_fetch_assoc($h);
                ?>
                <td><?php echo $row2['image']; ?></td>
                <td><?php echo $row1['adresse']; ?></td>
                <td><?php echo $row1['phone_number']; ?></td>
    
                
                
                <td>
                    <a href="update_an.php?id=<?= $row1['id']; ?>"><i class="fas fa-edit"></i></a>
                    <a href="supp_an.php?id=<?= $row1['id']; ?>"><i class="fas fa-trash"></i></a>

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
   