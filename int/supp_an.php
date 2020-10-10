<?php
include"../admin/config/db.php";
session_start();
if(!isset($_SESSION['user']))
header('location:login_user.php');
if(isset($_GET['id']))
{
$id=$_GET['id'];
     $t="select image from annonce where id=".$id ;
          $h=mysqli_query($c,$t);
          $row=mysqli_fetch_assoc($h);
          if($row['image']!=null)
              unlink('images/avatar1/'.$row['image']);
 $q="delete from annonce where id='$id'";
$r=mysqli_query($c,$q);
    header('location:index.html');   
}
