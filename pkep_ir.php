<?php
    session_start();

    $uprofilepic = $_FILES['upic'];
    if($uprofilepic['name']=="")   die("<script> alert('Nem választottál képet.')
                                parent.location.href='./?p=pkep'
    </script>");

    include("dbcsat.php");
    include("func_sizing.php");

    $user = mysqli_fetch_array(mysqli_query($adb, "SELECT upw FROM user WHERE ustrid='$_POST[ustrid]'"));
    if(md5($_POST['upw'])!=$user['upw'])  
    die("<script> alert('Hibás jelszó.')
        parent.location.href='./?p=pkep'
    </script>");

    $picname = date("YmdHis_") . $_POST['ustrid'] . "_" . randomstring(10) . substr($uprofilepic['name'], strrpos($uprofilepic['name'], "."));
    move_uploaded_file($uprofilepic['tmp_name'] , "./PROFILKEP/" . $picname);

    $t = strtolower(substr( $picname , -4 ));

    //kicsinyit( "./PROFILEPICS_ORG/".$picname , "./PROFILEPICS/".$picname );

    $str10  = randomstring();

    if( $t==".jpg" || $t=="jpeg" || $t==".gif" || $t==".png" || $t=="webp")
	{
        $t = mysqli_query($adb, "
            UPDATE  user
            SET     upic  =  '$picname'
            WHERE   ustrid      =   '$_POST[ustrid]'
        ");

        print "
        <script>
            alert('A profilkép módosítása megtörtént.')
            parent.location.href='./?p=pkep'
        </script>
        ";
    }
    else print "<script> alert('Ez a képformátum nem megfelelő.')</script>";

    mysqli_close($adb);
?>