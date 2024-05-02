<style>
.profile_box{
    margin : 100px auto;
    border : solid 1px ;
    border-radius : 20px;
    background-color : #F99417;
    padding : 10px;
    line-height : 30px;
    width :40%;
    
}
.profile_box h1{
    font-size :30px;
    color: white;
    text-shadow : 2px 2px 2px black;
    font-weight : bold;

}
.profile_box h3{
    font-size :20px;
    color: white;
    text-shadow : 2px 2px 2px black;
    font-weight : bold;
}
.profile_box input{
    width : 55%;
    padding: 10px 10px;
    margin : 5px 0;
    box-sizing : border-box;
    outline :none;
    

}


</style>
<?php
    if(!$belepve) die("<h2>Oldal megtekintéséhez jelentkezz be.</h2>
    
    
    ");

    $user = mysqli_fetch_array(mysqli_query($adb,"
                            SELECT * FROM user WHERE uid='$_SESSION[uid]'
                        "));
?>

<div class='profile_box'>
    <h1 style='text-align:center;'>Profil - Adatváltoztatás</h1>
    <h3 style='text-align:center;'><?=$_SESSION['uname'];?></h2>

    <form style='text-align:center;' action='adatvalt_ir.php' method='post'>
        <input type='text'      name='umail'    placeholder='Email'             value='<?=$user['umail'];?>'>       <br>
        <input type='text'      name='uname'    placeholder='Felhasználónév'          value='<?=$user['uname'];?>'>       <br>
        <input type='password'  name='upw'      placeholder='Jelszavas megerősítés'>                              <br>
        <input type='hidden'    name='ustrid'   value='<?=$user['ustrid'];?>'>                                      <br>
        <input type='submit' value='Mentés'>
    </form>
</div>