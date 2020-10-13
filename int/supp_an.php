<?php
include"../admin/config/db.php";
session_start();
if(!isset($_SESSION['user']))
header('location:login_user.php');
if(isset($_GET['id']))
{
    $id=$_GET['id'];
    $imgs = "SELECT * FROM image_an WHERE i_id='$id'";
    $query_imgs = mysqli_query($c,$imgs);
    $count_query_imgs = mysqli_num_rows($query_imgs);
    if($count_query_imgs>0){
        while($res_query_imgs = mysqli_fetch_assoc($query_imgs)){
            $res_query_imgs['image'];
            unlink('images/avatar1/'.$res_query_imgs['image']);
        }
        $q="delete from annonce where id='$id'";
        $r=mysqli_query($c,$q);
    }else{
        $q="delete from annonce where id='$id'";
        $r=mysqli_query($c,$q);
    }
    //header('location:index.html');
}
