<?php
session_start();
include('config/db.php');

if(!isset($_SESSION['admin']))
   header('location:login.php');
if(isset($_GET['id']))
    $id=$_GET['id'];
$sid = $_SESSION['admin']['id'];
$msg="SELECT m.*,(
    SELECT username from users where users.id = m.sender_id
)as username,
  (SELECT image from users where users.id = m.sender_id
)as  image
FROM `messages`as m where (m.r_id='$id' and m.sender_id='$sid') or (m.r_id='$sid' and m.sender_id='$id')";
$h=mysqli_query($c,$msg);
if(isset($_POST['envoyer']))
   {
                 if(isset($_POST['message']) AND  !empty($_POST['message'])) {
                 $message = htmlspecialchars($_POST['message']);
                 $date = date('Y-m-d H:i:s');
                 $q="insert into messages(r_id,sender_id,message,date) VALUES ('$id', '{$_SESSION['admin']['id']}','$message','$date')";
                 $l=mysqli_query($c,$q);
                 }
    }
?>
<html>
    <head>
        <link href="css/bootstrap.min.css" rel="stylesheet" >
    </head> 
<body>
          <div class="container">
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">Navbar</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul  class="navbar-nav ml-auto">
      <li class="nav-item active">
        <a class="nav-link" href="#">acceuil </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">mol</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
         <?php
        
        echo "<img src='images/avatar/".$_SESSION['admin']['image']."' style='width:20px; border-radius:60%'/>";
         echo  $_SESSION['admin']['name'];    
        ?>    
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="update_user.php">modifier mon compte</a>
          <a class="dropdown-item" href="queries/logout.php">se déconnecte</a>
          </div>
      </li>
          <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
         utilisateur
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="gest_users.php">liste des utilisateurs</a>
          <a class="dropdown-item" href="add_user.php">ajouter utilisateur</a>
          </div>
      </li>
     
    </ul>
    
  </div>
</nav>
    <?php
    while($row=mysqli_fetch_assoc($h))
    {
        if($_SESSION['admin']['id']==$row['sender_id']){
            echo "<img src='images/avatar/".$row['image']."' width='50' style='border-radius:50%'/>".$row['username']." à dit : ".$row['message']."<a href='deletemsg.php?mid=".$row['id']."&id_discussion=".$id."'>supprimer message</a><br>";   
        }else{
            echo "<img src='images/avatar/".$row['image']."' width='50' style='border-radius:50%'/>".$row['username']." à dit :".$row['r_id']. "/ ".$row['message']."<br>";   
        }
        
    }
    ?>
      <form  action="" method="post">
         <label>message:</label>
         <br /><br />
         <textarea placeholder="Votre message" name="message"></textarea>
         <br /><br />
        <input type="submit"  name="envoyer" />
        
      </form>
    </div>
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    </body>
       </html>