<?php
include "../admin/config/db.php";

session_start();
if (!isset($_SESSION['user']))
    header('location:login_user.php');


	if(isset($_GET['message']))
	{
		echo"<div class='alert alert-danger'>".$_GET['message']."</div>";
		
	}
	
?>

<html>
<head>
    <link rel="stylesheet" href="../admin/css/bootstrap.min.css">
    <link rel="stylesheet" href="../admin/css/all.min.css">
    <title>acceuil</title>
</head>
<body>
	
	
<table class="table">
	
	
  <thead>
	  <tr>
      <th scope="col">id</th>
      <th scope="col">produit</th>
      <th scope="col">prix</th>

    </tr>
	
	

	  
  </thead>


  <tbody>
	  <tr>
	 	<?php
	foreach($_SESSION as $name=>$value)
{
	

if(substr($name,0,8)=="annonce_")
{


?>	 

    
      <th scope="row"><?php echo $value['id']?></th>
      <td><?php echo $value['titre']?></td>
      <td><?php echo $value['prix']?></td>
		<td><a href="supp_ar.php?id=<?php echo $value['id'];?>"><i class="fa fa-trash" ></i></a></td>
      
    </tr>
	  			<?php
}

}
	?>
	

  </tbody>

</table>


	
	
	<script src="../admin/js/jquery.min.js"></script>
<script src="../admin/js/bootstrap.min.js"></script>
</body>
</html>
	