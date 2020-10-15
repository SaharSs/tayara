<?php
include"../admin/config/db.php";
session_start();
if(!isset($_SESSION['user']))
header('location:login_user.php');

if((isset($_GET['id'])) and (isset($_GET['aid'])))
{
         $id=$_GET['id'];
        $aid=$_GET['aid'];

         $t="select image from image_an where id=".$id;
         $h=mysqli_query($c,$t);
         $p=mysqli_num_rows($h);
         $row1=mysqli_fetch_assoc($h);

          
               if (is_file('images/avatar1/'.$row1['image'])) 
              
                  unlink('images/avatar1/'.$row1['image']);
         
          $aid=$_GET['aid'];
     
$m="delete from image_an where id='$id'";
$r1=mysqli_query($c,$m); 
header('location:update_an.php?id='.$aid); 
}
?>