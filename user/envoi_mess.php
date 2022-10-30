<?php
session_start();
include"../header.php";
include('../admin/config/db.php');
if(!isset($_SESSION['user']))
header('location:login_user.php');
if(isset($_GET['id']))
$id=$_GET['id'];
$sid = $_SESSION['user']['id'];
$msg="SELECT m.*,(
    SELECT username from users where users.id = m.sender_id
)as username,
  (SELECT image from users where users.id = m.sender_id
)as  image
FROM `messages`as m where (m.r_id='$id' and m.sender_id='$sid') or (m.r_id='$sid' and m.sender_id='$id')";
$h=mysqli_query($c,$msg);
if(isset($_POST['envoyer']))
{
$message = htmlspecialchars($_POST['message']);
    $date = date('Y-m-d H:i:s');
$q="insert into messages(r_id,sender_id,message,date) VALUES ('$id', '{$_SESSION['user']['id']}','$message','$date')";
$l=mysqli_query($c,$q);    
}

?>
<html>
<body>
<?php    
    while($row=mysqli_fetch_assoc($h))
    {
        if($_SESSION['user']['id']==$row['sender_id']){
        echo "<img src='../admin/images/avatar/".$row['image']."' width='50' style='border-radius:50%'/>".$row['username']." à dit : ".$row['message']."<a href='deletus.php?msg_id=".$row['id']."&id_discussion=".$id."'>supprimer message</a><br>";   
    }else
        {
        
        echo "<img src='../admin/images/avatar/".$row['image']."' width='50' style='border-radius:50%'/>". $row['username']." à dit : ".$row['message']."<br>";
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
    </body>
       </html>


