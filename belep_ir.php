<?php
    session_start();

    include("dbcsat.php");

    if($_POST['user']=="")  die("<script> alert('Nem adtad meg az E-mail címed vagy a Felhasználóneved!') 
    parent.location.href='./?p=belep'
    </script>");

    $upw = md5($_POST['pw']);
    
    $t = mysqli_query($adb, "
            SELECT  * FROM user
            WHERE   (uname='$_POST[user]' OR umail='$_POST[user]') 
            AND     upw = '$upw'
            AND     ustatus = 'A'
    ");

    if(mysqli_num_rows($t))
    {
        $sor = mysqli_fetch_array($t);

        $_SESSION['uid']    =   $sor['uid'];
        $_SESSION['uname']  =   $sor['uname'];
        $_SESSION['umail']  =   $sor['umail'];
        $_SESSION['upw']    =   $sor['upw'];
        $_SESSION['uperm']  =   $sor['uperm'];

        mysqli_query($adb, "
                INSERT INTO login   (lid,   luid,           ldate,  lip                     )
                VALUES              ('',    '$sor[uid]',    NOW(),  '$_SERVER[REMOTE_ADDR]' );
        ");
        $_SESSION['lid']    =   mysqli_insert_id($adb);

        print "
            <script>
                parent.location.href='./?p=hirdet'
            </script>
        ";
    }
    else 
    {
        die("<script> alert('Felhasználónév/jelszavad nem egyezik.')
                    parent.location.href='./?p=belep'
                    </script>");
    }

    mysqli_close($adb);

?>