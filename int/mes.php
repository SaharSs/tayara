<?php
include "../admin/config/db.php";
session_start();
if(!isset($_SESSION['user']))
header('location:login_user.php');

if(isset($_GET['id']) and isset($_GET['aid']))
{
$id=$_GET['id'];
$an_id=$_GET['aid'];
if(isset($_POST['envoyer']))
{

  if(isset($_POST['message']) && !empty($_POST['message'])) {
                $u=$id;   
                $m=$_POST['message'];
                 $date = date('Y-m-d H:i:s');
                 $q="insert into messages(r_id,sender_id,message,an_id,date) VALUES ('$u', '{$_SESSION['user']['id']}','$m','$an_id','$date')";
                 $l=mysqli_query($c,$q);
                 }    
}            

$sid = $_SESSION['user']['id'];
$msg="SELECT m.*,(
    SELECT username from users where users.id = m.sender_id   
)as username,
    (SELECT titre from annonce where annonce.id = m.an_id
)as titre
FROM messages as m where ((m.r_id='$id' and m.sender_id='$sid') or (m.r_id='$sid' and m.sender_id='$id')) and an_id='$an_id'";
$h=mysqli_query($c,$msg);
    while($row1=mysqli_fetch_assoc($h))
            {
      echo $row1['username']." à dit :".$row1['message']." ".$row1['titre']."<br>" ;    
            }
    }

?>
 <form  action="" method="post">
     <br>

  
         <label>message:</label>
         <br /><br />
         <textarea placeholder="Votre message" name="message"></textarea>
         <br /><br />
        <input type="submit"  name="envoyer" />
        
      </form>