<style>
.post{
    margin : 100px auto;
    border : solid 1px ;
    border-radius : 20px;
    background-color : #F99417;
    padding : 10px;
    line-height : 30px;
    width :40%;
    
}
.post h1{
    font-size :30px;
    color: white;
    text-shadow : 2px 2px 2px black;
    font-weight : bold;

}

.post p{
    text-decoration : none;
    color : white;
    font-family : arial;
    font-weight : bold;
    font-size : 15px;
}
.post input{
    width : 55%;
    padding: 10px 10px;
    margin : 5px 0;
    box-sizing : border-box;
    outline :none;


}

.post p:hover{
    color : #4d4c7d
   

}



</style>
<?php
    if(!$belepve) die("<h2>Az oldal megtekintéséhez jelentkezz be.</h2>");

    $user = mysqli_fetch_array(mysqli_query($adb,   "
                                                    SELECT * FROM user WHERE uid='$_SESSION[uid]'
                                                    "));
?>
<div class='post'>
    <h1 style='text-align:center;'>Töltsd fel a hirdetésed!</h1><br>
    <form style='text-align:center;' action='hirdet_ir.php' method='post' enctype='multipart/form-data'>
        <p><label for="postpic" style="cursor: pointer;">Kép feltöltés</label></p><br>
        <input type='file'  accept='image/gif, image/jpg, image/jpeg, image/png, image/webp' name='postpic' id="postpic" style='display: none;'><br>
        <input style='text-align:center' type="text" name='posttitle' value='Cim'><br>
        <input style='text-align:center' type="text" name='pdesc' value='Leirás'><br>
        <input style='text-align:center' type="tel" name='ptel' value='Telefonszám'>
        <input type='hidden'    name='ustrid'   value='<?=$user['ustrid'];?>'>
        <input type='hidden'    name='uid'   value='<?=$user['uid'];?>'>                                            
        <br>
        <input type='submit' value='HIRDET'>
    </form>
</div>

<script>
var loadFile = function(event) {
	var image = document.getElementById('output');
	image.src = URL.createObjectURL(event.target.files[0]);
};
</script>