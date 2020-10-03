<?php

include"config/db.php";
session_start();
if(!isset($_SESSION['admin']))
   header('location:login.php');
if(isset($_GET['id']))
{
     $id=$_GET['id'];    
     $t="select * from categories ";
     $h=mysqli_query($c,$t);
     while($row1=mysqli_fetch_assoc($h))
     {

      $id1=$row1['p_id'];   
      if($id1=='0')
        {
        $d1=null
        }
        }
        $m="delete from categories where id='$id'";
        $r1=mysqli_query($c,$m);   
    

    
}