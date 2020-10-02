<?php
session_start();
include('../admin/config/db.php');

if(!isset($_SESSION['user']))
   header('location:login_user.php');
if(!isset($_GET['msg_id']))
    header('Location:index.html');
if(!isset($_GET['id_discussion']))
    header('Location:index.html');
$msg_id=$_GET['msg_id'];
$d_id=$_GET['id_discussion'];
$q="DELETE FROM `messages` WHERE id=$msg_id";
$s=mysqli_query($c,$q);
header('location:envoi_mess.php?id='.$d_id);
