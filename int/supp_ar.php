<?php
include "../admin/config/db.php";
session_start();
function supp_pan($id)
{
unset($_SESSION['annonce_'.$id]);	
}
supp_pan($_GET['id']);
header('location:panier.php');