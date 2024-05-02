<?php
    session_start();

    $ppicture = $_FILES['postpic'];
    if($ppicture['name']=="")   die("<script> alert('Nem választottál képet.')
    parent.location.href='./?p=hirdet'
    </script>");

    include("dbcsat.php");
    include("func_sizing.php");

    $picname = date("YmdHis_") . $_POST['uid'] . "_" . randomstring(10) . substr($ppicture['name'], strrpos($ppicture['name'], "."));
    move_uploaded_file($ppicture['tmp_name'] , "./HIRDETKEP/" . $picname);

    $t = strtolower(substr( $picname , -4 ));

    resize_crop_image(230, 230, "./HIRDETKEP/".$picname , "./INDEXKEP/".$picname);

    if( $t==".jpg" || $t=="jpeg" || $t==".gif" || $t==".png" || $t=="webp")
	  {
        $t = mysqli_query($adb, "
        INSERT INTO posts   (pid,   puid,                 ppic,     ptitle,                 pdesc,              ptel,           pstatus,    pdate, pip                      )
        VALUES              ('',    '$_SESSION[uid]',     '$picname',   '$_POST[posttitle]',    '$_POST[pdesc]',    '$_POST[ptel]', 'Active',   NOW(), '$_SERVER[REMOTE_ADDR]'  );
        ");
        
        print "
        <script>
            alert('Hirdetésed feltöltésre került.')
            parent.location.href='./?p=hirdet'
        </script>
        ";
    }
    else print "<script> alert('A képformátum nem felel meg.')
    parent.location.href='./?p=hirdet'
    </script>";

    mysqli_close($adb);
?>