<style>


.container {
    background-color: #f99417;
    width           : 90%;
    padding-right   : 15px;
    padding-left    : 15px;
    padding-top     : 15px;
    padding-bottom  : 15px;
    margin-right    : auto;
    margin-left     : auto;
    box-shadow      : .125rem .25rem rgba(0,0,0,.075)!important;
}

.gallery {
    border: 1px solid #ccc;
    padding: 0 4px;
    float: left;
    background-color: white;
    box-shadow: .125rem .25rem rgba(0,0,0,.075)!important;
}

.gallery:hover {
  border: 1px solid #777;
}

.gallery img {
    margin: 5px;
}

.gallery p {
    margin-bottom: 0;
    word-break: break-word;
    margin: 0;
    padding: 0;
}
</style>


<?php

  if(!$belepve) die("<h2>Oldal megtekintéséhez jelentkezz be.</h2>");

  /* Képek lekérdezése */
  $kepek = mysqli_query( $adb , "
      SELECT * 
      FROM   posts
      WHERE pstatus = 'Active'
      ORDER BY pdate
  " ) ;

  print "<div class='container'>";
  while( $psor = mysqli_fetch_assoc( $kepek ) )
  {
    $user = mysqli_fetch_array (mysqli_query( $adb , "
      SELECT * 
      FROM   user
      WHERE uid = '$psor[puid]'
    " )) ;
    print "
    <div class='gallery'>
      <figure>
        <a href='./?p=nagyit&k=$psor[ppic]&c=$psor[pid]'>
          <img src='./INDEXKEP/$psor[ppic]'>
        </a>
        <figcaption>
          <p class='gallery-title'>
            $psor[ptitle]
          </p>
		  <p class='gallery-title'>
            $psor[ptel]
          </p>
          <p class='gallery-user'>
            by
            $user[uname]
          </p>
        </figcaption>
      </figure>
    </div>
    ";
  }
  print "<div style='clear:both;'>
        </div>
        </div>";
?>