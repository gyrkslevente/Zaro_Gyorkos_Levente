
<style>
.kep_box{
    margin : 100px auto;
    border : solid 1px ;
    border-radius : 20px;
    background-color : #F99417;
    padding : 10px;
    line-height : 30px;
    width :40%;
    
}
.kep_box h1{
    font-size :30px;
    color: white;
    text-shadow : 2px 2px 2px black;
    font-weight : bold;

}
.kep_box h3{
    font-size :20px;
    color: white;
    text-shadow : 2px 2px 2px black;
    font-weight : bold;
}
.kep_box input{
    width : 55%;
    padding: 10px 10px;
    margin : 5px 0;
    box-sizing : border-box;
    outline :none;
}

.kep_box a{
    color : white;
    font-family : arial;
    font-weight : bold;
    font-size : 15px;
}

.kep_box p{
    text-decoration : none;
    color : white;
    font-family : arial;
    font-weight : bold;
    font-size : 15px;
}

.kep_box p:hover{
    color : #4d4c7d
   

}
.kep_box img {
    width           : 20%;
    border-radius   : 20%;
}


</style>


<?php
    if(!$belepve) die("<h2>Az oldal megtekintéséhez jelentkezz be.</h2>");

    $user = mysqli_fetch_array(mysqli_query($adb,   "
                                                    SELECT * FROM user WHERE uid='$_SESSION[uid]'
                                                    "));
?>
<?php
    $profilkep = mysqli_query($adb, "
                SELECT upic
                FROM user 
                WHERE   ustrid      =   '$user[ustrid]'
        ");
    $rows = mysqli_fetch_array($profilkep);
    $kep = $rows['upic'];
?>
<div class='kep_box'>
    <h1 style='text-align:center;'>Profil-Profilkép változtatás</h1>
    <h3 style='text-align:center;'><?=$_SESSION['uname'];?></h3>
    <form style='text-align:center;' action='pkep_ir.php' method='post' enctype='multipart/form-data'>
        <h3>Profil képed</h3>
        <img src='PROFILKEP/<?=$kep;?>' class='pic' alt='<?=$kep;?>'><br><br>
        <p><label for='upic' style='cursor: pointer;'>Képfeltöltése</label></p>
        <input type='file'  accept='image/gif, image/jpeg, image/png' id='upic' name='upic' style='display: none;'>                                                                  <br>
        <input type='password'  name='upw'      placeholder='Jelszavas megerősítés'><br>
        <input type='hidden'    name='ustrid'   value='<?=$user['ustrid'];?>'>                                          
        <hr style='margin:16px 0px;'>
        <input type='submit' value='Mentés'>
    </form>

    
</div>
