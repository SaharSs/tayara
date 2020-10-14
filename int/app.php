<?php

include"../admin/config/db.php";
session_start();
if(!isset($_SESSION['user']))
header('location:login_user.php');
if((isset($_GET['id'])) and (isset($_GET['aid'])))
{
         $id=$_GET['id'];
         $id1=$_GET['aid'];
         if($id1==1)
         {
         $t="UPDATE annonce SET cas=0 where id=".$id;
         $r2=mysqli_query($c,$t);
         }
    

header('location:liste_an.php');
}