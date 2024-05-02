<style>
.jel_box{
    margin : 100px auto;
    border : solid 1px ;
    border-radius : 20px;
    background-color : #F99417;
    padding : 10px;
    line-height : 30px;
    width :40%;
    
}
.jel_box h1{
    font-size :30px;
    color: white;
    text-shadow : 2px 2px 2px black;
    font-weight : bold;

}
.jel_box h3{
    font-size :20px;
    color: white;
    text-shadow : 2px 2px 2px black;
    font-weight : bold;
}
.jel_box input{
    width : 55%;
    padding: 10px 10px;
    margin : 5px 0;
    box-sizing : border-box;
    outline :none;


}


</style>
<?php
    if(!$belepve) die("<h2>Az oldal megtekintéséhez jelentkezz be.</h2>");

    $user = mysqli_fetch_array(mysqli_query($adb,"
                            SELECT * FROM user WHERE uid='$_SESSION[uid]'
                        "));
?>

<div class='jel_box'>
    <h1 style='text-align:center;'>Profile - Jelszó változtatás</h1>
    <h3 style='text-align:center;'><?=$_SESSION['uname'];?></h3>
    <form style='text-align:center;' action='jelvalt_ir.php' method='post'>
        <input type='password'  name='upw'      placeholder='Régi jelszó'>      <br>
        <input type='password'  name='pw1'      placeholder='Új jelszó'>             <br>
        <input type='password'  name='pw2'      placeholder='Új jelszó megerősitése'>      <br>
        <input type='hidden'    name='ustrid'   value='<?=$user['ustrid'];?>'>          <br>
        <hr>
        <input type='submit' value='Mentés'>
    </form>
</div>