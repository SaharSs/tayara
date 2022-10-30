<?php
include "../admin/config/db.php";
session_start();
include "../header.php";
if (!isset($_SESSION['user']))
    header('location:login_user.php');


	if(isset($_GET['message']))
	{
		echo"<div class='alert alert-danger'>".$_GET['message']."</div>";
		
	}
	
?>


	
	
<table class="table">
	 <thead>
	  <tr>
      <th scope="col">id</th>
      <th scope="col">produit</th>
      <th scope="col">prix</th>
      <th scope="col">total</th>
     

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
           <td><?php echo $_SESSION['totales']?></td>
           
           <td><a href="supp_ar.php?id=<?php echo $value['id'];?>&prix=<?php echo $value['prix'];?>"><i class="fa fa-trash" ></i></a></td>
           </tr>
             <?php
             }
             }
		  	
		     ?>
    </tbody>

 </table>
	
<a href="ind.php">payer</a>	
