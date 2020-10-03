<?php
include"config/db.php";
session_start();
if(!isset($_SESSION['admin']))
   header('location:login.php');
$q="select * from categories ";
$s = mysqli_query($c, $q);
?>
<html>
    <head>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/all.min.css">
    <title>acceuil</title>   
    </head>
    <body>
<table class="table">
  <thead>
    <tr>
      <th scope="col">id</th>
      <th scope="col">p_id</th>
      <th scope="col">cat</th>
  </tr>
    </thead>
    <tbody>
    <?php while($row=mysqli_fetch_assoc($s)){
        ?>
              <tr>
      <th scope="row"><?php echo $row['id'];?></th>
     
      <td><?php echo $row['p_id'];?></td>
      <td><?php echo $row['cat'];?></td>
              <td>
          <a href="up1.php?id=<?=$row['id'];?>"><i class="fas fa-edit"></i></a>
          <a href="delet_cat.php?id=<?=$row['id'];?>"><i class="fas fa-edit"></i></a>
          
        </td>  
     </tr>          
    <?php
}
    ?>        
        </tbody>
        </table>
  <script src="js/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
    </body>
</html>