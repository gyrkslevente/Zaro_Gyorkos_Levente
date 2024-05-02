<style>
.belep_box{
    margin : 100px auto;
    border : solid 1px ;
    border-radius : 20px;
    background-color : #F99417;
    padding : 10px;
    line-height : 30px;
    width :40%;
}
.belep_box h1{
    text-align : center;
    font-size :30px;
    color: white;
    text-shadow : 2px 2px 2px black;
    font-weight : bold;

}
.belep_box input{
    width : 55%;
    padding: 10px 10px;
    margin : 5px 0;
    box-sizing : border-box;
    outline :none;


}


</style>


<div class='belep_box'>
<h1>Belépés</h1><br>
<form style='margin:24px 48px; line-height:32px; text-align : center;' 
    action='belep_ir.php' method='post'>

    <input type='text' name='user' placeholder='Felhasználónév/e-mail'><br>
    <input type='password' name='pw' placeholder='Jelszó'><br><br>
    
    <input type='submit' value="Bejelentkezés">

    <hr><br>

    <input type="button" value="Regisztráció" onclick='location.href="./?p=reg"'>
</div>
</form>