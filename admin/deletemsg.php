<?php
session_start();
include('config/db.php');

if(!isset($_SESSION['admin']))
   header('location:login.php');
if(!isset($_GET['mid']))
    header('Location:index.php');
if(!isset($_GET['id_discussion']))
    header('Location:index.php');
$msg_id=$_GET['mid'];
$d_id=$_GET['id_discussion'];
$q="DELETE FROM `messages` WHERE id=$msg_id";
$s=mysqli_query($c,$q);
header('location:e.message.php?id='.$d_id);
