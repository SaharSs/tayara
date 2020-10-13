<?php
include"../admin/config/db.php";
session_start();
if(!isset($_SESSION['user']))
header('location:login_user.php');
if(isset($_GET['id']))
{
$id=$_GET['id'];
$t="select image from image_an where i_id=".$id;
$h=mysqli_query($c,$t);
$p=mysqli_num_rows($h);
    if($p>0)
        {
            
          while($row=mysqli_fetch_assoc($h))
          {
              if (is_file('images/avatar1/'.$row['image'])) 
              
               unlink('images/avatar1/'.$row['image']);
         
          }
        }
     
 $m="delete from annonce where id='$id'";
        $r1=mysqli_query($c,$m);   
    
    
     
header('location:index.html');   
}
