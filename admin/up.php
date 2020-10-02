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
    //$s = "UPDATE categories SET cat='$p'  where id='$id' ";
    if($id!=$p)
    {
    if($p=='0')
    {
    $s = "UPDATE categories SET cat='$ca' ,p_id=null where id='$id' ";
    }
    else 
    {
    $s = "UPDATE categories SET cat='$ca',p_id='$p'  where id='$id' ";
    }
        
    }
    //else
    //{$s = "UPDATE categories SET cat='$ca' where id='$id' "}
    
    $r = mysqli_query($c, $s);
}

?>
<html>
<head>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <title>acceuil</title>
</head>
<body>
<form method="post" action="">
    <table>
        <tr>
            <td>
                <!--<input type="text" name="p_id" id="p_id" value="--><?php //echo $cat ?><!--">-->
                <input type="text" name="cat" id="cat" value="<?php echo $cat ?>">
            </td>
        </tr>
        <tr>
            <td>
                <!--<select id="cars" name="cat">-->
                <select id="p_id" name="p_id">
                    <!--<option value="catégories mère">catégories mère</option>-->
                    <option value="0" <?php if($pid==null){echo 'selected';}?>>Catégorie Mère</option>
                    <?php
                    //function cate($p_id = 0)
                    function cate($p_id = null,$s='')
                    {
                        global $c;
                        global $pid;
                        global $id;
                        if($p_id==null)
                      {
                      $query = "SELECT * FROM categories where p_id is null ";
                        }else
                   {
                  $query = "SELECT * FROM categories where p_id='$p_id' ";

                     }
                         $result = mysqli_query($c, $query);
                        $p = mysqli_num_rows($result);
                        while ($row = mysqli_fetch_assoc($result)) {
//                            if ($row['id'] == $id) {
//                                ?>
<!--                                <option value="--><?php //echo $row['id']; ?><!--" selected>--><?php //echo $row['cat']; ?><!--  </option>-->
                            <?php
//                            }
//                            if ($row['id'] != $id) {
                                ?>
                                    <!--<option value="--><?php //echo $row['id']; ?><!--">--><?php //echo $s.$row['cat']; ?><!--  </option>-->
                                    <option value="<?php echo $row['id']; ?>" <?php if($pid==$row['id']){ echo 'selected';}?>><?php if($row['id']!=$id){echo $s.$row['cat']; }?></option>
                                <?php
                            //}
                            cate($row['id'],$s='---');
                        }
                    }
                    ?>
                    <?php
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
