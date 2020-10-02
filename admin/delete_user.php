<?php

include"config/db.php";
session_start();
if(!isset($_SESSION['admin']))
   header('location:login.php');
if(isset($_GET['id']))
{
$id=$_GET['id'];
     $t="select image from users where id=".$id ;
          $h=mysqli_query($c,$t);
          $row=mysqli_fetch_assoc($h);
          if($row['image']!="default.png")
              unlink('images/avatar/'.$row['image']);
$q="delete from users where id='$id'";
$r=mysqli_query($c,$q);
    header('location:index.php');
}


?>