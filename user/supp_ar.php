<?php
include "../admin/config/db.php";
session_start();
function supp_pan($id,$prix)
{
unset($_SESSION['annonce_'.$id]);
$_SESSION['totales']-=$prix;	
}
supp_pan($_GET['id'],$_GET['prix']);


header('location:panier.php');