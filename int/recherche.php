	<meta charset="utf-8" />
<?php
include"../admin/config/db.php";
session_start();
if(!isset($_SESSION['user']))
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
?>

<html>
     
    
    
    <form method="POST" action=""> 
     Recherchez  
    <input type="text" name="recherche">
     <input type="submit" value="recherche"> 
     </form>
    
    
    
</html>
