<?php
include"../admin/config/db.php";
session_start();
if(!isset($_SESSION['user']))
header('location:login_user.php');
if(isset($_GET['id']))
{
$id=$_GET['id'];
 $q="delete from annonce where id='$id'";
$r=mysqli_query($c,$q);
    header('location:index.html');   
}
