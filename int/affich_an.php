<?php
include"../admin/config/db.php";
session_start();
if (!isset($_SESSION['user']))
    header('location:login_user.php');
  $q = "SELECT * FROM annonce WHERE  a_id={$_SESSION['user']['id']} ";
     $r=mysqli_query($c,$q); 
         while( $row = mysqli_fetch_assoc($r)){
    
      $q1="select * from image_an where i_id=".$row['id'];
      $r1=mysqli_query($c,$q1);

         while ($row2 = mysqli_fetch_assoc($r1)) {
    
            if($row['cas']==1)
              {
                echo $row['titre'];
                
                
                 echo "<img src='images/avatar1/".$row2['image']."' width='50' style='border-radius:50%'/><button>active</button><br><br>";
                 
}
             
               

?>
<form method="post" action="">
<button type="submit" name="an"><strong>désactivé</strong></button>
    </form>
     <?php
         if(isset($_POST['an']))
            {
         if($row['cas']==1)
         {
            
         $t="UPDATE annonce SET cas=0 where id='{$row['id']}'";
$r2=mysqli_query($c,$t);
         }
         }
         }
         }


       ?>

 



    