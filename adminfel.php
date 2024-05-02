<?php 
//Felhasználok adatai
$userdata = mysqli_query($adb, "
      SELECT * 
      FROM   user
      ORDER BY udate
      ");
//Bejelentkezések adatai
$loginsdata = mysqli_query($adb, "
      SELECT * 
      FROM   login
      ORDER BY ldate
      "); 
//Posztok adatai
$postdata = mysqli_query($adb, "
      SELECT * 
      FROM   posts
      ORDER BY pdate
      ");
     


//Posztok archiválása
if(isset($_REQUEST['parchive'])){
      if(mysqli_query($adb, "
      UPDATE posts SET pstatus = 'Archived' WHERE pid = '$_REQUEST[pid]'
      ")){
            print "<script>
                  alert('The post has been archived.')
                  parent.location.href=parent.location.href
            </script>";
      }
      else print "<script> alert('The post couldn't be archived.')</script>"; 
}


//Posztok aktiválása
if(isset($_REQUEST['pactive'])){
      if(mysqli_query($adb, "
      UPDATE posts SET pstatus = 'Active' WHERE pid = '$_REQUEST[pid]'
      ")){
            print "<script>
                  alert('The post has been activated.')
                  parent.location.href=parent.location.href
            </script>";
      }
      else print "<script> alert('The post couldn't be activated.')</script>"; 
}



?>

<style>
      table, th, td {
            border      : 1px solid black ;
            padding     : 10px;
      }
      th {
            background-color: #363062 ;
            color: white;
      }
      tr {
            background-color: white;
            color: black;
      }
      tr:nth-child(even) {
            background-color  : white;

    
      }   
      
      .belso {
    margin: 24px;
    background-color: #F99417;
    background-repeat: no-repeat;
    background-position: bottom right;
    border: solid 2px #448;
    border-radius: 12px;
    box-shadow: 8px 8px 4px #555;
    font-family: Verdana;
    color: #D60;
}

.bal {
    width: 200px;
    height: 370px;
    float: left;
    margin-top: 0;
    padding: 24px 0 48px 0;
    text-align: center;
}

.bal a {
    display: block;
    text-decoration: none;
    border: solid 1px #224;
    border-radius: 8px;
    margin: 8px 24px;
    padding: 8px;
    background-color: #BBB;
    color: #224;
    font-size: 12px;
    font-weight: bold;
}

.bal input {
    display: block;
    text-decoration: none;
    border: solid 1px #224;
    border-radius: 8px;
    margin: 8px 24px;
    padding: 8px;
    background-color:#363062 ;
    color: white;
    font-size: 12px;
    font-weight: bold;
}

.jobb {
    width: 70%;
    min-height: 420px;
    margin-left: 248px;
    padding: 32px;
    line-height: 18px;
    font-size: 12px;
    text-align: justify;
}

.jobb h1 {
    font-family     : arial;
    font-size       : 60px;
    color           : #363062;
    text-shadow     : 2px 2px 2px rgb(255, 255, 255);
    font-weight     : bold;
    text-align      : center;
}

</style>

<div class='keret'>
      <div class='belso bal'>
            <form method="get"> 
                <input type="submit" name="users"     class="button"    value="Felhasználó"     />
                <input type="submit" name="logins"    class="button"    value="Belépések"    />
                <input type="submit" name="posts"     class="button"    value="Posztok"     />
                <input type="hidden" name="p"                           value="adminfel"/>
            </form>
      </div>

      <div class='belso jobb' >
            <h1>Admin felület</h1>

<?php

      if(isset($_GET['users'])) 
      { 
            print "<table style=width:100%>
                  <tr>
                        <th>UID                </th>
                        <th>Felhasználónév              </th>
                        <th>Email              </th>
                        <th>Profilkép       </th>
                        <th>Reg Ideje               </th>
                        <th>Státusz                </th>
                        <th>Jogosultság            </th>
                  </tr>";
            while( $userdatarow = mysqli_fetch_array( $userdata ) )
            {
                  print "
          	      <tr>
              	      <td>$userdatarow[uid]               </td>
              	      <td>$userdatarow[uname]             </td>
              	      <td>$userdatarow[umail]             </td>
              	      <td>$userdatarow[upic]       </td>
              	      <td>$userdatarow[udate]             </td>
                        <td>$userdatarow[ustatus]           </td>
	      		<td>$userdatarow[uperm]             </td>
          	      </tr>";
            }
            print "</table>"; 
      }

      if(isset($_GET['logins'])) 
      { 
            print "<table style=width:100%>
                  <tr>
                        <th>BelépésID       </th>
                        <th>BelépőID   </th>
                        <th>Bejelentkezés ideje     </th>
                        <th>IP cim       </th>
                  </tr>";
            while( $loginsdatarow = mysqli_fetch_array( $loginsdata ) )
            {
        	      print "
          	      <tr>
              	      <td>$loginsdatarow[lid]          </td>
              	      <td>$loginsdatarow[luid]         </td>
              	      <td>$loginsdatarow[ldate]     </td>
              	      <td>$loginsdatarow[lip]        </td>
          	      </tr>";
            }
            print "</table>"; 
      }
      
  

      if(isset($_GET['posts'])) 
      { 
            print "<table style=width:100%>
                  <tr>
                        <th>PosztID        </th>
                        <th>UserID        </th>
                        <th>Fájl neve      </th>
                        <th>Cime    </th>
                        <th>Dátum      </th> 
                        <th>Státusz       </th>
                        <th colspan='2'>Parancsok</th>
                  </tr>";
            while( $postdatarow = mysqli_fetch_array( $postdata ) )
            {
        	      print "
          	      <tr>
              	      <td>$postdatarow[pid]          </td>
              	      <td>$postdatarow[puid]         </td>
              	      <td>$postdatarow[ppic]     </td>
              	      <td>$postdatarow[ptitle]       </td>
              	      <td>$postdatarow[pdate]        </td>
                        <td>$postdatarow[pstatus]      </td>
              	      <td>
              	          <a href='./?p=nagyit&k=$postdatarow[ppic]&c=$postdatarow[pid]'>
              	              <button>Megtekintés</button>
              	          </a>
              	      </td>
                        <td>";
                        if($postdatarow['pstatus']!='Active') {
                              print "
                                    <form action='' method='post'>
                                          <input type='submit' name='pactive' value='Aktiválás'>
                                          <input type='hidden' name='pid'     value='$postdatarow[pid]'>
                                    </form>
                                    ";
                        }
                        else print "
                              <form action='' method='post'>
                                    <input type='submit' name='parchive' value='Archiválás'>
                                    <input type='hidden' name='pid'     value='$postdatarow[pid]'>
                              </form>
                              ";
                        print "</td> 
          	      </tr>";
            }
            print "</table>"; 
      } 

     

      if(isset($_GET['d']) && $_GET['d']=="delete") 
      { 
            $deletepicdata = mysqli_query($adb, "
                  UPDATE posts
                  SET pstatus = 'Archived'
                  WHERE pid =   '$_GET[pid]'
                  ");
      }

      if(isset($_GET['a']) && $_GET['a']=="active") 
      { 
            $activepicdata = mysqli_query($adb, "
                  UPDATE posts
                  SET pstatus = 'Active'
                  WHERE pid =   '$_GET[pid]'
                  ");
      }

?> 

      </div>

</div>



