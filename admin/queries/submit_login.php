<?php
include('../config/db.php');
session_start();


$u=$_POST['username'];    
$p=$_POST['password'];
$q="select * from users where (username='$u' and password='$p') AND (role='webmaster' or role='admin') ";
    $r=mysqli_query($c,$q);
    $n=mysqli_num_rows($r);
    if($n>0)
    {
        $l=mysqli_fetch_assoc($r);
       $_SESSION['admin']=$l;
        echo $_SESSION['admin'];
        header('location:../index.php');    
    }else{
          echo 'Vos cordonnées sont incorrectes veuillez <a href="../login.php">se connecter de nouveau</a>';
    }
