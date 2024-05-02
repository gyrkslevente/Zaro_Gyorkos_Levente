<?php

session_start();

include ("dbcsat.php");

unset($_SESSION['uid']);
unset($_SESSION['uname']);
unset($_SESSION['umail']);
unset($_SESSION['upw']);
unset($_SESSION['uperm']);
unset($_SESSION['lid']);



print "<script>
        parent.location.href='./'
        </script>
        ";

mysqli_close($adb);        
?>