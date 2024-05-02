<style>
    .post-container {
    display: block;
    margin: auto;
    margin-bottom: 15px;
    background-color: #F99417;
    width: 50%;
    padding-top: 2px;
    padding-bottom: 2px;
    box-shadow: .125rem .25rem rgba(0,0,0,.075)!important;
    line-height: 1.7em;
    padding: 15px;
}

.post-picture img {
    width: 60%;
    display: block;
    margin-left: auto;
    margin-right: auto;
}
.post-container h1{
  font-size :30px;
    color: white;
    text-shadow : 2px 2px 2px black;
    font-weight : bold;
}
.post-container h4{
  color : white;
  word-break : break-word;
  padding : 8px;
}
.post-container h5{
  color : white;
  word-break : break-word;
  padding : 5px;
}

.comments {
  background-color : white;
  display: grid;
  padding: 0 20px;
}

article {
  border : solid 1px ;
  margin-top: 1.0rem;
  grid-gap: 0 5px;
}





</style>



<?php

  if(!$belepve) die("<h2>Oldal megtekintéséhez bekell jelentkezned.</h2>");

  $user = mysqli_fetch_array(mysqli_query($adb,"
                        SELECT * FROM user WHERE uid='$_SESSION[uid]'
                        "));
  
  $poszt = mysqli_fetch_array(mysqli_query( $adb, "
                        SELECT * FROM posts
                        WHERE pid = '$_GET[c]'
                        "));

?>

<div class='post-container'>
  <h1 style='text-align:center;'><?=$poszt['ptitle'];?></h1> 
</div>
<div class='post-container'>
  <div class='post-picture'>
    <img src='./HIRDETKEP/<?=$_GET['k'];?>'>
  </div> 
  <h4><?=$poszt['pdesc'];?></h4>
  <h5>Elérhetőségeim : <br>E-mail : <?=$user['umail'];?><br> Telefonszám : <?=$poszt['ptel'];?> </h5>
  
</div>


<div class='post-container'>
  <form style='margin:24px 48px; line-height:28px; text-align:center' action='kommentek_ir.php' method='post' target='kisablak'>
    <textarea name='ckomment' cols=60 rows=2></textarea></br>
    <input type='submit' value='Üzenet elküldése'>
    <input type='hidden'    name='ustrid'   value='<?=$user['ustrid'];?>'>
    <input type='hidden'    name='uid'   value='<?=$user['uid'];?>'>
    <input type='hidden'    name='uname'   value='<?=$user['uname'];?>'>
    <input type='hidden'    name='cpid'   value='<?=$poszt['pid'];?>'>
  </form>

  <?php
    $kommentek = mysqli_query( $adb , "
        SELECT * 
        FROM   comments, user
        WHERE cpid = '$poszt[pid]' AND cuid = uid AND cstatus = 'Active'
        ORDER BY cdate
    " ) ;

    while( $csor = mysqli_fetch_array( $kommentek ) )
    {
      print "
      <article class='comments'>
        <p>$csor[uname]:</p>
        <p>$csor[ctext]</p>
        <br>
      </article>
      ";
    }
  ?>

</div>



