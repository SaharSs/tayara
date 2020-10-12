<?php
include "../admin/config/db.php";
session_start();
if(!isset($_SESSION['user']))
header('location:login_user.php');
if(isset($_GET['id']))
{
$id=$_GET['id'];
$q="select * from annonce where id=".$id;
$r=mysqli_query($c,$q);

while ($row2 = mysqli_fetch_assoc($r)) {
        $pid = $row2['pid'];
        $titre = $row2['titre'];
        $texte_annonce = $row2['texte_annonce'];
        $prix = $row2['prix'];
        $adresse = $row2['adresse'];
        $phone_number = $row2['phone_number'];
    }
}
    
   if (isset($_POST['submit']))
    {
    $pi = $_POST['pid'];
    $ti = $_POST['titre'];
    $an = $_POST["texte"];
    $pri = $_POST['prix'];
    $ad = $_POST['adresse'];
    $ph = $_POST['phone_number'];
     if ($_FILES['image']['name'] != null) {
        $img = $_FILES['image']['name'];
        $img1 = $_FILES['image']['tmp_name'];
        $im = explode('.', $img);
        $im = end($im);
        $imgn = md5(rand(0, 1000) . '_' . $img) . '.' . $im;
        move_uploaded_file($img1, 'images/avatar1/' . $imgn);
        $s = "UPDATE annonce SET pid='$pi',titre='$ti',texte_annonce='$an',prix='$pri',image='$imgn',adresse='$ad',  phone_number='$ph' WHERE id='$id'";
        $l = mysqli_query($c, $s);
        //$t="UPDATE image_an SET  image='$imgn' WHERE id='$id'";
        $t = "insert into image_an (image,i_id)values('$imgn','$id')";
        $p = mysqli_query($c, $t);
    } else {
        $s = "UPDATE annonce SET pid='$pi',titre='$ti',texte_annonce='$an',prix='$pri',adresse='$ad', phone_number='$ph' WHERE id='$id'";
        $l = mysqli_query($c, $s);
    }
}
    
    
    
    
?>
<form method="post" action="" enctype="multipart/form-data">
    <table>
        <tr>
            <td>
                <label id="for">catégories</label><br>
                <select name="pid" id="for">
                    <option>choisissez</option>
                    <ul>
                        <?php

                        function cate($p_id = null)
                        {
                            global $c;
                            global $id;
                            global $pid;
                            if ($p_id == null) {
                                $query = "SELECT * FROM categories where p_id is null ";
                            } else {
                                $query = "SELECT * FROM categories where p_id='$p_id' ";
                            }
                            $result = mysqli_query($c, $query);
                            $p = mysqli_num_rows($result);
                            while ($row = mysqli_fetch_assoc($result)) {
                                ?>
                                <option value="<?php echo $row['id']; ?>" <?php if ($pid == $row['id']) {
                                    echo 'selected';
                                } ?>><?= $row['cat']; ?></option>
                                <?php
                                cate($row['id']);

                            }
                        }?>
                        <ul>
                            <?php echo cate(); ?>
                        </ul>
                    </ul>
                </select>
        </tr>
        <tr>

            <td>
                <label id="u">titre</label><br>
                <input type="text" name="titre" id="u" value="<?= $titre ?>"/></td>
        </tr>
        <tr>
            <td>
                <label id="p">texte de l'annonce</label><br>
                <input type="text" name="texte" id="p" value="<?= $texte_annonce ?>"/></td>
        </tr>
        <tr>

            <td>
                <label id="e">prix</label><br>
                <input type="text" name="prix" id="e" value="<?= $prix ?>"/></td>
        </tr>
        <tr>
            <td>
                <label id="i">image</label><br>
                <input type="file" name="image" id="i"/></td>
        </tr>
        <tr>

            <td>
                <label id="a">adresse</label><br>
                <input type="text" name="adresse" id="a" value="<?= $adresse ?>"/></td>
        </tr>
        <tr>
            <td>
                <label id="ph">phone_number</label><br/>
                <input type="text" name="phone_number" id="ph" value="<?= $phone_number ?>"/></td>
        </tr>
        <tr>
        <tr>
            <td><br/>
                <button type="submit" name="submit"><strong>submit</strong></button>
            </td>
        </tr>
    </table>
</form>
