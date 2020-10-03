<?php
include"config/db.php";
session_start();
if(!isset($_SESSION['admin']))
header('location:login.php');
if(isset($_POST['submit']))
{
        $d=$_POST['fname'];
        $ra=$_POST['rank'];  
        $q1 = "SELECT * FROM categories where cat='$d'";
        $k=mysqli_query($c,$q1);
        $p=mysqli_num_rows($k);
        if($p>0)
              {
              echo " exist";        
              }else
              {
         if($ra!=null)
         {
         $q="INSERT INTO `categories`(cat,p_id) VALUES ('$d','$ra')";
         }else
         {
         $q="INSERT INTO `categories`(cat) VALUES ('$d')";
         }
         $l=mysqli_query($c,$q); 
         }
}
?>
<!DOCTYPE html>
<html>
<body>
<h2>HTML Forms</h2>
<form action="" method="post">
<label for="fname">catégories</label><br>
<input type="text" id="fname" name="fname" ><br>
<label for="cars">Choose :</label>
<select  id="cars" name="rank" >
<option value="<?php echo null;?>" >catégories mère  </option>
<ul>    

<?php
function cate($p_id=null)
{  
global $c;     
if($p_id==null)
     {
     $query = "SELECT * FROM categories where p_id is null ";
     }else
     {
     $query = "SELECT * FROM categories where p_id='$p_id' ";
     }
     $result = mysqli_query($c, $query);
     $p=mysqli_num_rows($result);    
     while($row=mysqli_fetch_assoc($result))
     {
     ?>
    
      <option  value="<?php echo $row['id']; ?> "><?php echo $row['cat']; ?>  </option>
      <?php    
      cate($row['id']) ;   
      }
}
?>
<ul> 
      <?php    
      echo  cate();
      ?>
</ul>
</ul>    
</select>
<input type="submit" name="submit" value="Submit"/>
</form> 
</body>
</html>
