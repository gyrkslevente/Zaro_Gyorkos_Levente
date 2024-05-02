<?php
    session_start();

    if($_POST['upw'] =="")              die("<script> alert('Nem adtál meg jelszót.')
    parent.location.href='./?p=jelvalt'
    </script>");

    include("dbcsat.php");

    if(strlen($_POST['pw1'])<4)         die("<script> alert('Jelszavad túl rövid.') 
    parent.location.href='./?p=jelvalt'
    </script>");
    if($_POST['pw1']!=$_POST['pw2'])    die("<script> alert('Jelszavak nem egyeznek.')
    parent.location.href='./?p=jelvalt'
    </script>");
   
    $user = mysqli_fetch_array(mysqli_query($adb, "SELECT upw FROM user WHERE ustrid='$_POST[ustrid]'"));
    if(md5($_POST['upw'])!=$user['upw'])  
    die("<script> alert('Hibás jelszó.') 
    parent.location.href='./?p=jelvalt'
    </script>");
    
    $upw    = md5($_POST['pw1']);

    $t = mysqli_query($adb, "
            UPDATE  user
            SET     upw    =    md5('$_POST[pw1]')
            WHERE   ustrid  =   '$_POST[ustrid]'
    ");

    print "
        <script>
            alert('Változtatás sikeres.')
            parent.location.href='./?p=profil'
        </script>
    ";

    mysqli_close($adb);

?>