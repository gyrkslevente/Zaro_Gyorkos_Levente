<style>
.profil_doboz{
    margin : 100px auto;
    border : solid 1px ;
    border-radius : 20px;
    background-color : #F99417;
    padding : 10px;
    line-height : 30px;
    width :40%;
    
}
.profil_doboz h1{
    font-size :30px;
    color: white;
    text-shadow : 2px 2px 2px black;
    font-weight : bold;

}
.profil_doboz h3{
    font-size :20px;
    color: white;
    text-shadow : 2px 2px 2px black;
    font-weight : bold;
}
.profil_doboz a{
    text-decoration : none;
    color : white;
    font-family : arial;
    font-weight : bold;
    font-size : 15px;
}
.profil_doboz a:hover{
    color : #4d4c7d
   

}
</style>

<?php
    if(!$belepve) die ("<h2> Valami</h2>");

    $admin =mysqli_fetch_array(mysqli_query($adb,  "
        SELECT * FROM user WHERE uperm ='$_SESSION[uperm]'
    "));
?>

<div class ='profil_doboz'>
    <h1 style ='text-align:center;'> Profilod</h1>
    <h3 style ='text-align:center;'><?=$_SESSION['uname'];?></h3>
    <ul>
        <li><a href="./?p=adatvalt">Név vagy e-mail változtatás</a>
        <li><a href="./?p=jelvalt">Jelszó változtatás</a>
        <li><a href="./?p=pkep">Profilkép változtatás</a>
        <?php
            if($_SESSION['uperm']== 'Admin') print "<li><a href='./?p=adminfel'>Admin Felület</a>";
        ?>
        <hr>
        <input type="button" class='gomb' value ='Kilépés' onclick ='location.href="kilep_ir.php"'>
    </ul>
</div>