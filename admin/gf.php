<?php
include"config/db.php";
session_start();
if(!isset($_SESSION['admin']))
   header('location:login.php');
if(isset($_GET['id']))
{
$id=$_GET['id'];
    $pe="select * from users where id=$id";
    $d=mysqli_query($c,$pe);
    while($row=mysqli_fetch_assoc($d))
    {
    $na=$row['name'];
    $ue=$row['username'];
    $pa=$row['password'];
    $em=$row['email'];
    $ea=$row['etat'];
    $im=$row['image'];
    $ad=$row['adresse'];
$post=$row['postcode'];
$pho=$row['phone_number'];
    
    
    }
    
}
if(isset($_POST['btn-update']))
 {
    
$n=$_POST['name'];
$u=$_POST['username'];
$p=$_POST['password'];
$e=$_POST['email'];
$et=$_POST['etat'];
$a=$_POST['adresse'];
$po=$_POST['postcode'];
$ph=$_POST['phone_number'];
    $sql ="SELECT * FROM users WHERE (username = '$u' or password='$p' or email='$e' or phone_number='$ph') and id<>$id";
$r=mysqli_query($c,$sql);
$total = mysqli_num_rows($r);
if($total==0)
{
      if(($_FILES['image']['name'])!=''){
        $img=$_FILES["image"]["name"];
        $img1=$_FILES["image"]["tmp_name"];
        $ext=explode('.',$img);
          $ext=end($ext);
          $imgname = md5(date('Y-m-d H:i:s').' '.$img).'.'.$ext;
          move_uploaded_file($img1,"images/avatar/".$imgname);
          //select img field 
          $t="select image from users where id=".$id ;
          $h=mysqli_query($c,$t);
          $row=mysqli_fetch_assoc($h);
          if($row['image']!=null)
              unlink('images/avatar/'.$row['image']);
          $s="UPDATE users SET lname='$n',username='$u',password='$p',email='$e',etat='$et',image='$imgname',adresse='$a',postcode='$po',  phone_number='$ph' WHERE id='$id'";
    }else{
        $s="UPDATE users SET name='$n',username='$u',password='$p',email='$e',etat='$et',adresse='$a',postcode='$po',  phone_number='$ph' WHERE id='$id'";

    }
    $m=mysqli_query($c,$s);
  
}else{
    echo'data can not update';
}
}

?>
<html>
<head>

</head>
<body>
<center>
<form method="post" action="" enctype="multipart/form-data">
<table align="center">
<tr>
<td>
<label id="for">name</label><br>    
<input type="text" name="name" id="for"  value="<?= $na ?>" />  </td>
</tr>
<tr>

<td>
<label id="u">username</label><br>     
<input type="text" name="username" id="u" value="<?= $ue ?>"/> </td>
</tr>
<tr>
    
   
<td>
<label id="p">password:</label><br>     
<input type="password" name="password" id="p"  value="<?= $pa ?>" /> </td>
</tr>
<tr>

<td>
<label id="e">email</label><br>        
<input type="text" name="email"  id="e" value="<?= $em ?>"/> </td>
</tr>
<tr>

<td>
<label id="et">etat</label><br>        
<input type="text" name="etat" id="et" value="<?= $ea ?>"/> </td>
</tr>

<tr>
<td>
 <label id="i">image</label><br>
    
<input type="file" name="image" id="i"  /> </td>
</tr>
<tr>
    
<td>
<label id="a">adresse</label><br>    
<input type="text" name="adresse"  id="a" value="<?= $ad ?>"/> </td>
</tr>
<tr>
    
<td>
<label id="po">postcode</label><br>    
<input type="text" name="postcode"  id="po" value="<?= $post ?>"/> </td>
</tr>
<tr>
    
<td>
<label id="ph">phone_number</label><br/>    
<input type="text" name="phone_number"  id="ph" value="<?= $pho ?>"/> </td>
</tr>    
<tr>
<td>    
<button type="submit" name="btn-update"><strong>UPDATE</strong></button>
</td>
</tr>
</table>
</form>

</center>
</body>
</html>
---------------------------------------------------------------------------
<?php
include"config/db.php";
session_start();
if(!isset($_SESSION['admin']))
   header('location:login.php');
if(isset($_POST['btn-update']))
 {
$n=$_POST['name'];
$u=$_POST['username'];
$p=$_POST['password'];
$e=$_POST['email'];
$et=$_POST['etat'];
var_dump($_FILES['image']);
    exit();
$a=$_POST['adresse'];
$po=$_POST['postcode'];
$ph=$_POST['phone_number'];
$re=$_POST['role'];  
    $sql ="SELECT username FROM users WHERE username = '$u' or email='$e' or phone_number='$ph' ";
$r=mysqli_query($c,$sql);
$total = mysqli_num_rows($r);
if($total==0)
{
    if($_FILES['image']['name']!=''){
        $im=$_FILES['image']['name'];  
        $im1=$_FILES['image']['tmp_name'];
        $ex=explode('.',$im);
        $ex=end($ex);
        $img=md5(rand(0,1000).'_'.$im).'.'.$ex;    
        move_uploaded_file($im1,"images/avatar/".$img);
    }else{
        $img='def-av.png';
    }
    $l="insert into users (name,username,password,email,etat,image,adresse,postcode,phone_number,role)values('$n','$u','$p','$e','$et','$img','$a','$po','$ph','$re')";
    $r=mysqli_query($c,$l);    
}else{
    header('location:add_user.php');
}
    
}

?>
<html>
    <head>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <title>acceuil</title>   
    </head>
    <body>
  <div class="container">
        <nav id="navbar-example2" class="navbar navbar-light bg-light">
  <a class="navbar-brand" href="#">Navbar</a>
  <ul class="nav nav-pills">
    <li class="nav-item">
      <a class="nav-link" href="index.php">acceuil</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#">mol</a>
    </li>
    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false"><?php echo $_SESSION['admin']['name'];?></a>
      <div class="dropdown-menu">
        <a class="dropdown-item" href="#">modifier mon compte</a>
        <a class="dropdown-item" href="queries/logout.php">se déconnecter</a>
        </div>
        
    </li>
      <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">utilisateurs</a>
      <div class="dropdown-menu">
        <a class="dropdown-item" href="gest_users.php">liste des utilisateurs</a>
        <a class="dropdown-item" href="add_user.php">ajouter utilisateur</a>
        </div>
        
    </li>
  </ul>
</nav>

        </div>
<div class="container">
<form method="post" action="" enctype="multipart/form-data">
<table >
<tr>
<td>
<label id="for">name</label><br>    
<input type="text" name="name" id="for"   />  </td>
</tr>
<tr>
     
<td>
<label id="u">username</label><br>     
<input type="text" name="username" id="u" /> </td>
</tr>
<tr>
    
   
<td>
<label id="p">password</label><br>     
<input type="password" name="password" id="p"   /> </td>
</tr>
<tr>

<td>
<label id="e">email</label><br>        
<input type="text" name="email"  id="e" /> </td>
</tr>
<tr>

<td>
<label id="et">etat</label><br>        
<input type="text" name="etat" id="et" /> </td>
</tr>

<tr>
<td>
 <label id="i">image</label><br>
    
<input type="file" name="image" id="i"  /> </td>
</tr>
<tr>
    
<td>
<label id="a">adresse</label><br>    
<input type="text" name="adresse"  id="a"/> </td>
</tr>
<tr>
    
<td>
<label id="po">postcode</label><br>    
<input type="text" name="postcode"  id="po" /> </td>
</tr>
<tr>
    
<td>
<label id="ph">phone_number</label><br/>    
<input type="text" name="phone_number"  id="ph" /> </td>
</tr> 
<tr>
<tr>    
<td>
<label id="ph">role</label><br/>    
<input type="text" name="role"  id="ph"  /> </td>
</tr>     
<tr>
<td>
<button type="submit" name="btn-update"><strong>ajouter</strong></button>
</td>
</tr>
</table>
</form>
</div>    
                      <script src="js/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
    </body>
</html>
--------------------------------------------------------------------------------------------------------------
<div class="row">
                 <?php
                if($_SESSION['admin']['role']=='webmaster')
                {    
$q="select* from users where role='admin' or role='user'";
                    //hathika wella najmou n7ottou fi blassetha requete hathi
                    //$q="select* from users where id<>".$_SESSION['admin']['id'].";


//tji hna ta3mli else{
                  //requete lokhra w bennessba lel champs mta3 role tet7akmi fih bel session mouch hakka khir? //ay iwalli tableau wa7ed  
                //}
                }else{
                    $q="select* from users where  role='user'";
                }
                $r=mysqli_query($c,$q);
?>    
<table class="table">
  <thead>
    <tr>
      <th scope="col">id</th>
      <th scope="col">Nom</th>
      <th scope="col">Nom d'utilisateur</th>
      <th scope="col">password</th>
      <th scope="col">email</th>
      <th scope="col">etat</th>
      <th scope="col">image</th>
      <th scope="col">adresse</th>
      <th scope="col">postcode</th>
      <th scope="col">teléphone</th>
    <?php if($_SESSION['admin']['role']=='webmaster'){?>  <th scope="col">role</th> <?php } ?>
      <th scope="col" width=50></th>
    </tr>
  </thead>
  <tbody>
    <?php  
    while($row=mysqli_fetch_assoc($r)){
    ?>    
    <tr>
      <th scope="row"><?php echo $row['id'];?></th>
      <td><?php echo $row['name'];?></td>
      <td><?php echo $row['username'];?></td>
      <td><?php echo $row['password'];?></td>
    <td><?php echo $row['email'];?></td>    
    <td><?php echo $row['etat'];?></td>    
    <td><?php echo $row['image'];?></td>    
    <td><?php echo $row['adresse'];?></td>    
    <td><?php echo $row['postcode'];?></td>    
      <td><?php echo $row['phone_number'];?></td>
      <?php if($_SESSION['admin']['role']=='webmaster'){?>  <td><?php echo $row['role'];?></td> <?php } ?>
        
      <td>
          <a href="update_user.php?id=<?=$row['id'];?>"><i class="fas fa-edit"></i></a>
          <a href="delete_user.php?id=<?=$row['id'];?>"><i class="fas fa-trash"></i></a>
        </td>
    </tr>
      <?php
    }
        ?>
  </tbody>
</table>    
<a  href="add_user.php"class="btn btn-primary">Ajouter Utilisateur</a>        
        
        
            </div> 
        </div>
        
