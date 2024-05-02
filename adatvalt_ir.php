<?php
    session_start();

    if($_POST['umail']=="")     die("<script> alert('Nem adtál meg E-mail cimet.')
    parent.location.href='./?p=adatvalt'
    </script>");
    if($_POST['uname'] =="")    die("<script> alert('Nem adtál meg felhasználónevet.')
    parent.location.href='./?p=adatvalt'
    </script>");

    include("dbcsat.php");

    if(mysqli_num_rows(mysqli_query($adb, "SELECT * FROM user WHERE umail='$_POST[umail]' AND ustrid!='$_POST[ustrid]'")))
    die("<script> alert('Egy másik fiók már rendelkezik ezzel az E-mail cimmel.')
    parent.location.href='./?p=adatvalt'
    </script>");
    
    if(mysqli_num_rows(mysqli_query($adb, "SELECT * FROM user WHERE uname='$_POST[uname]' AND ustrid!='$_POST[ustrid]'")))
    die("<script> alert('Felhasználónév már foglalt.')
        parent.location.href='./?p=adatvalt'
    </script>");

    $user = mysqli_fetch_array(mysqli_query($adb, "SELECT upw FROM user WHERE ustrid='$_POST[ustrid]'"));
    if(md5($_POST['upw'])!=$user['upw'])  
    die("<script> alert('Hibás jelszó.')
    parent.location.href='./?p=adatvalt'
    </script>");
    
    $t = mysqli_query($adb, "
            UPDATE  user
            SET     uname    =  '$_POST[uname]',
                    umail   =   '$_POST[umail]'
            WHERE   ustrid  =   '$_POST[ustrid]'
    ");

    print "
        <script>
            alert('Sikeres a változtatás.')
            parent.location.href='./?p=profil'
        </script>
    ";

    mysqli_close($adb);

?>