<?php
    session_start();

    include("dbcsat.php");

    if($_POST['ckomment'] == "")
    die("<script> alert('Nem irtál kommentet') 
parent.location.href='./?p=nagyit'
</script>");

    $_POST = str_replace("<" , "< " , $_POST);
    $uzenet = $_POST['ckomment'];

    mysqli_query($adb, "
            INSERT INTO comments    (cid,    cpid,              cuid,           ctext,         cdate,  cstatus,     cip)
            VALUES                  ('',     '$_POST[cpid]',    '$_POST[uid]',  '$uzenet',     NOW(),  'Active',    '$_SERVER[REMOTE_ADDR]');
    ");

    mysqli_close($adb);

    print "<script> 
                alert('Köszönjük a hozzászolásod!')
                parent.location.href=parent.location.href
            </script>
    ";
?>
