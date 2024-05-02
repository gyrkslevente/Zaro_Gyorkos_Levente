<?php
    session_start();
    date_default_timezone_set("Europe/Budapest");

    if(isset($_GET['p'])) $p = $_GET['p'];
    else $p = "";
    if(isset($_SESSION['uid'])) $belepve=1;
    else                        $belepve=0;

    include("dbcsat.php");


    if($belepve ==1) $user = mysqli_fetch_array(mysqli_query($adb , "
                                SELECT * FROM user WHERE uid ='$_SESSION[uid]'
                                "));
?>

<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>
    <?php
        if( isset($_GET['p'])) $p=$_GET['p'] ; else $p="" ;

        if($p=="fo"               )   print "Főoldal"               ; else
        if($p=="hirdet"               )   print "Hirdetések"               ; else
        if($p=="belep"               )   print "Belépés"               ; else
        if($p=="reg"               )   print "Regisztráció"               ; else
        print "Hirdessunk.hu"
    
    ?>
    </title>
</head>
<body>
    <?php

    if(!$belepve) print "
        <div id='menu'>
        <a href='./?p=fo'                >   Főoldal  </a> 
        <a href='./?p=belep'       >   Belépés      </a>  
        <a href='./?p=reg'       >   Regisztráció      </a> 
        </div>
        ";
    
    else{
        print "
            <div id='menu'>
            <a href='./?p=fo'                >   Főoldal  </a> 
            <a href='./?p=hirdetesek'       >   Hirdetések     </a> 
            <a href='./?p=hirdet'       >   Hirdess    </a> 
            <a href='./?p=profil'       >   $_SESSION[uname]     </a> 

            </div>
        ";
    }
    
    ?>
    <div id=tartalom>
    <?php

    // print_r( $_GET )    ;
    if(!isset($_SESSION['uid']))
        {
            if($p=="fo"             )   include("fo_form.php")                          ; else
            if($p=="belep"          )   include("belep_form.php")                       ; else
            if($p=="reg"            )   include("reg_form.php")                         ; else
            include("fo_form.php");
        }
        else 
        {
            if($p=="fo"             )   include("fo_form.php")                          ; else
            if($p=="hirdetesek"     )   include("hirdetesek.php")                          ; else
            if($p=="hirdet"         )   include("hirdet_form.php")                      ; else
            if($p=="belep"          )   include("belep_form.php")                       ; else
            if($p=="reg"            )   include("reg_form.php")                         ; else
            if($p=="profil"         )   include("profil.php")                         ; else
            if($p=="adatvalt"       )   include("adatvalt_form.php")                         ; else
            if($p=="jelvalt"        )   include("jelvalt_form.php")                         ; else
            if($p=="pkep"           )   include("pkep_form.php")                         ; else
            if($p=="adminfel"       )   include("adminfel.php")                         ; else
            if($p=="nagyit"         )   include("nagyit.php")                         ; else

            include("fo_form.php");
        }
    ?>
</body>
<iframe name ='kisablak' width=000 height=000 x_frameborder=0></iframe>
</html>