<style>
body {font-family: Georgia, 'Times New Roman', Times, serif;
        background-color: #4D4C7D
}
.reg_box{
    margin : 100px auto;
    border : solid 1px ;
    border-radius : 20px;
    background-color : #F99417;
    padding : 10px;
    line-height : 30px;
    width :40%;
}
.reg_box h1{
    text-align : center;
    font-size :30px;
    color: white;
    text-shadow : 2px 2px 2px black;
    font-weight : bold;

}
.reg_box input{
    width : 55%;
    padding: 10px 10px;
    margin : 5px 0;
    box-sizing : border-box;
    outline :none;


}


</style>

<form action="reg_ir.php" method='post' style="margin:24px 48px; line-height:32px; text-align : center;">
<div class='reg_box'>
<h1>Regisztráció</h1>

  

    
    <hr>

   
    <input type="text" placeholder="Email " name="umail" required>

   
    <input type="text" placeholder="Felhasználónév " name="uname" required>


    
    <input type="password" placeholder="Jelszó" name="pw1" required>

    <input type="password" placeholder="Jelszó megerősítés" name="pw2" required>


    
    
    
    
    <p>Már van  <a href="./?p=belep" style="color:dodgerblue">fiókom</a>.</p>

   
      <button type="submit" class="signupbtn">Regisztráció</button>
    
  </div>
</form>
