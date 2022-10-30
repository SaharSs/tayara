<?php
include "../admin/config/db.php";
session_start();
if (!isset($_SESSION['user']))
    header('location:login_user.php');
if(isset($_POST['id']) ){
$id=$_POST['id'];
	$q="select * from annonce where id='$id'";
	$r=mysqli_query($c,$q);
	$row=mysqli_fetch_assoc($r);
	if($_SESSION['annonce_'.$row['id']]['titre']==$_POST['produit'])
	{
	$message="vous avez déja ajouté ce produit";
    header('location:panier.php?message='.$message);
	}else{
	
	$_SESSION['annonce_'.$row['id']]=array
	(
	'id'=>$row['id'],
	'titre'=>$row['titre'],	
	'prix'=>$row['prix'],	
		
	);

$_SESSION['totales']+=$_SESSION['annonce_'.$row['id']]['prix'];
		

	header('location:panier.php');

}
}



?>