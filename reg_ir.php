<?php
    session_start();

    include("dbcsat.php");

    if($_POST['uname']=="")  die("<script> alert('Nem adtál meg Felhasználónevet.')
                                parent.location.href='./?p=reg'
    </script>");
    if($_POST['umail']=="")  die("<script> alert('Nem adtál meg az Email címed.')
                                parent.location.href='./?p=reg' 
    </script>");

    if(strlen($_POST['pw1'])<4)  die("<script> alert('A megadott jelszó túl rövid.')
                                    parent.location.href='./?p=reg' 
    </script>");
    if($_POST['pw1']!=$_POST['pw2'])  die("<script> alert('A megadott jelszavak nem egyezznek.')
                                    parent.location.href='./?p=reg' 
    </script>");

    if(mysqli_num_rows(mysqli_query($adb, "SELECT * FROM user WHERE uname = '$_POST[uname]'")))
    die("<script> alert('Ez a felhasználónév már foglalt.')</script>");

    if(mysqli_num_rows(mysqli_query($adb, "SELECT * FROM user WHERE umail = '$_POST[umail]'")))
    die("<script> alert('Ezzel az Email címmel már regisztráltak.')
                        parent.location.href='./?p=reg' 
    </script>");

    $upw    = md5($_POST['pw1']);
    $str10  = randomstring();
    mysqli_query($adb, "
            INSERT INTO user    (uid ,  uname,              umail,              upw,        upic,    uip,                        udate,  ustatus,    uperm,  ustrid        ) 
            VALUES              (NULL,  '$_POST[uname]',    '$_POST[umail]',    '$upw',     'template.jpg',             '$_SERVER[REMOTE_ADDR]',    NOW(),  'A',        '',     '$str10'      );
    ");

    mysqli_close($adb);

    print "<script> 
                alert('Sikeresen regisztráltál!')
                parent.location.href='./?p=belep'
            </script>
    ";
?>