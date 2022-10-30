<?php
include('config/db.php');
session_start();
if (!isset($_SESSION['admin']))
    header('location:login.php');
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $q2 = "select * from  categories where id=" . $id;
    $re = mysqli_query($c, $q2);
    while ($row1 = mysqli_fetch_assoc($re)) {
        $cat = $row1['cat'];
        $pid = $row1['p_id'];
    }
}
if (isset($_POST['submit'])) {
    $p = $_POST['p_id'];
    $ca = $_POST['cat'];
    if ($id != $p) {
        if ($p == '0') {
            $s = "UPDATE categories SET cat='$ca' ,p_id=null where id='$id' ";
        } else {
            $s = "UPDATE categories SET cat='$ca',p_id='$p'  where id='$id' ";
        }
    }
    $r = mysqli_query($c, $s);
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
      <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false"><?php 
          
        echo "<img src='images/avatar/".$_SESSION['admin']['image']. "' style='width:20px; border-radius:60%'/>";
     
          
          echo $_SESSION['admin']['name'];?></a>
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

<form method="post" action="">
    <table>
        <tr>
            <td>
                <input type="text" name="cat" id="cat" value="<?php echo $cat ?>">
            </td>
        </tr>
        <tr>
            <td>
                <select id="p_id" name="p_id">
                    <option value="0" <?php if ($pid == null) {echo 'selected';} ?>>Catégorie Mère</option>
                    <?php
                    function cate($p_id = null, $s = '')
                    {
                        global $c;
                        global $pid;
                        global $id;
                        if ($p_id == null) {
                            $query = "SELECT * FROM categories where p_id is null";
                        } else {
                            $query = "SELECT * FROM categories where p_id='$p_id'";
                        }
                        $result = mysqli_query($c, $query);
                        while ($row = mysqli_fetch_assoc($result)) {
                            if($row['id']!=$id) {?>
                                <option value="<?php echo $row['id']; ?>" <?php if ($pid == $row['id']) {echo 'selected';} ?>><?= $s . $row['cat'];?></option>
                        <?php
                            }
                            cate($row['id'], $s = '---');
                        }
                    }
                    echo cate();
                    ?>
                </select>
            </td>
        </tr>
        <tr>
            <td>
                <button type="submit" name="submit">update</button>
            </td>
        </tr>
    </table>
</form>
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>
