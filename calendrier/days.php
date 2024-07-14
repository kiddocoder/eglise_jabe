<?php 

  require_once("../root.php");
  include(Root_path."./include/header.php");
  include(Root_path."./include/menu.php");
  
  // get date
  $date = $_GET['date'];
?>

<div class="article">
  <div class="menu_left">
   <ul>

     <li class="collapsible"><img align="center" src="<?php echo base_url;?>images/sportscat/primus.jpg" alt="primus" width="30px"> Primus League</li>
     <!-- collapse menu -->
     <div class="content">
        <ul>
          <li><a href="./today.php"><img align="center" src="<?php echo base_url;?>images/sportsicons/football.png" alt="primus" width="30px"> Matchs</a></li>
          <li><a href="../classement.php"><img align="center" src="<?php echo base_url;?>images/sportsicons/cup.png" alt="classement" width="30px"> Ranking</a></li>
          <li><a href="../players.php"><img align="center" src="<?php echo base_url;?>images/sportsicons/playerfoot.png" alt="players" width="30px"> Players</a></li>
          <li><a href="../transfer.php"><img align="center" src="<?php echo base_url;?>images/sportsicons/transfer.png" alt="transfer" width="30px"> Transfers</a></li>
          <li><a href="../archives.php"><img align="center" src="<?php echo base_url;?>images/sportsicons/football.png" alt="archives" width="30px"> Archives</a></li>
        </ul>
     </div>

      <li class="collapsible"><img align="center" src="<?php echo base_url;?>images/sportsicons/jambe.png" alt="lumitel" width="30px"> League B</li>
       <!-- collapse menu -->
        <div class="content">
          <ul>
            <li><a href="./today.php"><img align="center" src="<?php echo base_url;?>images/sportsicons/football.png" alt="primus" width="30px"> Matchs</a></li>
            <li><a href="../classement.php"><img align="center" src="<?php echo base_url;?>images/sportsicons/cup.png" alt="classement" width="30px"> Ranking</a></li>
            <li><a href="../players.php"><img align="center" src="<?php echo base_url;?>images/sportsicons/playerfoot.png" alt="players" width="30px"> Players</a></li>
            <li><a href="../archives.php"><img align="center" src="<?php echo base_url;?>images/sportsicons/football.png" alt="archives" width="30px"> Archives</a></li>
          </ul>
      </div>

      <li class="collapsible"><img align="center" src="<?php echo base_url;?>images/sportsicons/cup.png" alt="Leagueb" width="30px"> President's Cup</li>
      <!-- collapse menu -->
      <div class="content">
        <ul>
          <li><a href="./today.php"><img align="center" src="<?php echo base_url;?>images/sportsicons/football.png" alt="primus" width="30px"> Matchs</a></li>
          <li><a href="../classement.php"><img align="center" src="<?php echo base_url;?>images/sportsicons/cup.png" alt="classement" width="30px"> Ranking</a></li>
          <li><a href="../archives.php"><img align="center" src="<?php echo base_url;?>images/sportsicons/football.png" alt="archives" width="30px"> Archives</a></li>
        </ul>
      </div>

      <li class="collapsible"><img align="center" src="<?php echo base_url;?>images/sportsicons/cup.png" alt="Leagueb" width="30px"> NKURUNZIZA's Cup</li>
      <!-- collapse menu -->
      <div class="content">
        <ul>
          <li><a href="./today.php"><img align="center" src="<?php echo base_url;?>images/sportsicons/football.png" alt="primus" width="30px"> Matchs</a></li>
          <li><a href="../classement.php"><img align="center" src="<?php echo base_url;?>images/sportsicons/cup.png" alt="classement" width="30px"> Ranking</a></li>
          <li><a href="../archives.php"><img align="center" src="<?php echo base_url;?>images/sportsicons/football.png" alt="archives" width="30px"> Archives</a></li>
        </ul>
      </div>

      <li class="collapsible"><img align="center" src="<?php echo base_url;?>images/sportsicons/women.png" alt="division3" width="30px"> Championship League</li>
      <!-- collapse menu -->
      <div class="content">
        <ul>
          <li><a href="./today.php"><img align="center" src="<?php echo base_url;?>images/sportsicons/football.png" alt="primus" width="30px"> Matchs</a></li>
          <li><a href="../classement.php"><img align="center" src="<?php echo base_url;?>images/sportsicons/cup.png" alt="classement" width="30px"> Ranking</a></li>
          <li><a href="../archives.php"><img align="center" src="<?php echo base_url;?>images/sportsicons/football.png" alt="archives" width="30px"> Archives</a></li>
        </ul>
      </div>

      <li class="collapsible"><img align="center" src="<?php echo base_url;?>images/sportsicons/women.png" alt="division3" width="30px"> Unit's Cup</li>
      <!-- collapse menu -->
      <div class="content">
        <ul>
          <li><a href="./today.php"><img align="center" src="<?php echo base_url;?>images/sportsicons/football.png" alt="primus" width="30px"> Matchs</a></li>
          <li><a href="../classement.php"><img align="center" src="<?php echo base_url;?>images/sportsicons/cup.png" alt="classement" width="30px"> Ranking</a></li>
          <li><a href="../archives.php"><img align="center" src="<?php echo base_url;?>images/sportsicons/football.png" alt="archives" width="30px"> Archives</a></li>
        </ul>
      </div>

      <li class="collapsible"><img align="center" src="<?php echo base_url;?>images/sportsicons/jambe.png" alt="lumitel" width="30px"> Super Cup</li>
      <!-- collapse menu -->
      <div class="content">
        <ul>
          <li><a href="./today.php"><img align="center" src="<?php echo base_url;?>images/sportsicons/football.png" alt="primus" width="30px"> Matchs</a></li>
          <li><a href="../classement.php"><img align="center" src="<?php echo base_url;?>images/sportsicons/cup.png" alt="classement" width="30px"> Ranking</a></li>
          <li><a href="../archives.php"><img align="center" src="<?php echo base_url;?>images/sportsicons/football.png" alt="archives" width="30px"> Archives</a></li>
        </ul>
      </div>

      <li class="collapsible"><img align="center" src="<?php echo base_url;?>images/sportsicons/jambe.png" alt="lumitel" width="30px"> Heroes Cup</li>
      <!-- collapse menu -->
      <div class="content">
        <ul>
          <li><a href="./today.php"><img align="center" src="<?php echo base_url;?>images/sportsicons/football.png" alt="primus" width="30px"> Matchs</a></li>
          <li><a href="../classement.php"><img align="center" src="<?php echo base_url;?>images/sportsicons/cup.png" alt="classement" width="30px"> Ranking</a></li>
          <li><a href="../archives.php"><img align="center" src="<?php echo base_url;?>images/sportsicons/football.png" alt="archives" width="30px"> Archives</a></li>
        </ul>
      </div>

      <li class="collapsible"><img align="center" src="<?php echo base_url;?>images/sportsicons/school.png" alt="university" width="30px"> Universities & High schools</li>
      <!-- collapse menu -->
      <div class="content">
        <ul>
          <li><a href="./today.php"><img align="center" src="<?php echo base_url;?>images/sportsicons/football.png" alt="primus" width="30px"> Matchs</a></li>
          <li><a href="../classement.php"><img align="center" src="<?php echo base_url;?>images/sportsicons/cup.png" alt="classement" width="30px"> Ranking</a></li>
          <li><a href="../archives.php"><img align="center" src="<?php echo base_url;?>images/sportsicons/football.png" alt="archives" width="30px"> Archives</a></li>
        </ul>
      </div>

      <li class="collapsible"><img align="center" src="<?php echo base_url;?>images/sportsicons/football.png" alt="province" width="30px"> Provinces and Communes</li>
      <!-- collapse menu -->
      <div class="content">
        <ul>
          <li><a href="./today.php"><img align="center" src="<?php echo base_url;?>images/sportsicons/football.png" alt="primus" width="30px"> Matchs</a></li>
          <li><a href="../classement.php"><img align="center" src="<?php echo base_url;?>images/sportsicons/cup.png" alt="classement" width="30px"> Ranking</a></li>
          <li><a href="../archives.php"><img align="center" src="<?php echo base_url;?>images/sportsicons/football.png" alt="archives" width="30px"> Archives</a></li>
        </ul>
      </div>

      <li class="collapsible"><img align="center" src="<?php echo base_url;?>images/sportsicons/cup.png" alt="freinds" width="30px"> Internationals</li>
      <!-- collapse menu -->
      <div class="content">
        <ul>
          <li><a href="./today.php"><img align="center" src="<?php echo base_url;?>images/sportsicons/football.png" alt="primus" width="30px"> Matchs</a></li>
          <li><a href="../archives.php"><img align="center" src="<?php echo base_url;?>images/sportsicons/football.png" alt="archives" width="30px"> Archives</a></li>
        </ul>
      </div>

      <li class="collapsible"><img align="center" src="<?php echo base_url;?>images/sportsicons/cup.png" alt="freinds" width="30px"> Freindship Games</li>
      <!-- collapse menu -->
      <div class="content">
        <ul>
          <li><a href="./today.php"><img align="center" src="<?php echo base_url;?>images/sportsicons/football.png" alt="primus" width="30px"> Matchs</a></li>
        </ul>
      </div>

      <li class="collapsible"><img align="center" src="<?php echo base_url;?>images/sportsicons/women.png" alt="freinds" width="30px"> All Women's leagues</li>
      <!-- collapse menu -->
      <div class="content">
        <ul>
          <li><a href="./today.php"><img align="center" src="<?php echo base_url;?>images/sportscat/Leaguewomen.jpg" alt="primus" width="30px"> Lumitel Women's league</a></li>
          <li><a href="../players.php"><img align="center" src="<?php echo base_url;?>images/sportsicons/playerfoot.png" alt="players" width="30px"> League B</a></li>
          <li><a href="../players.php"><img align="center" src="<?php echo base_url;?>images/sportsicons/playerfoot.png" alt="players" width="30px"> President's Cup</a></li>
          <li><a href="../players.php"><img align="center" src="<?php echo base_url;?>images/sportsicons/playerfoot.png" alt="players" width="30px"> NKURUNZIZA's Cup</a></li>
          <li><a href="../teams.php"><img align="center" src="<?php echo base_url;?>images/sportsicons/teams.png" alt="teams" width="30px"> Unit's cup</a></li>
          <li><a href="../teams.php"><img align="center" src="<?php echo base_url;?>images/sportsicons/teams.png" alt="teams" width="30px"> Super up</a></li>
          <li><a href="../transfer.php"><img align="center" src="<?php echo base_url;?>images/sportsicons/transfer.png" alt="transfer" width="30px"> championship League</a></li>
          <li><a href=""><img align="center" src="<?php echo base_url;?>images/sportsicons/school.png" alt="university" width="30px"> Universities & High schools</a></li>
          <li><a href="../archives.php"><img align="center" src="<?php echo base_url;?>images/sportsicons/football.png" alt="archives" width="30px"> Internationals</a></li>
        </ul>
     </div>
   </ul>
  
  </div>
  <div class="center">
    <ul class="days">
      <li class="live">
        <a href="">
          <div>Live Match</div>
        </a>
      </li>
      <li class="day2">
        <a href="">
          <div class="day"><?php echo date('D', strtotime('-3 day')); ?></div>
          <div class="date"><?php echo date('d-m', strtotime('-3 day')); ?></div>
        </a>
      </li>
      <li class="day2">
        <a href="">
          <div class="day"><?php echo date('D', strtotime('-2 day')); ?></div>
          <div class="date"><?php echo date('d-m', strtotime('-2 day')); ?></div>
        </a>
      </li>
      <li>
        <a href="">
          <div class="day"><?php echo date('D', strtotime('-1 day')); ?></div>
          <div class="date"><?php echo date('d-m', strtotime('-1 day')); ?></div>
        </a>
      </li>
      <li>
        <a href="">
          <div class="day"><?php echo date('D'); ?></div>
          <div class="date"><?php $today=date('d-m'); echo $today; ?></div>
        </a>
      </li>
      <li>
        <a href="">
          <div class="day"><?php echo date('D', strtotime('+1 day')); ?></div>
          <div class="date"><?php echo date('d-m', strtotime('+1 day')); ?></div>
        </a>
      </li>
      <li class="day2">
        <a href="">
          <div class="day"><?php echo date('D', strtotime('+2 day')); ?></div>
          <div class="date"><?php echo date('d-m', strtotime('+2 day')); ?></div>
        </a>
      </li>
      <li class="day2">
        <a href="">
          <div class="day"><?php echo date('D', strtotime('+3 day')); ?></div>
          <div class="date"><?php echo date('d-m', strtotime('+3 day')); ?></div>
        </a>
      </li>
      <li class="calendar">
        <a href="./calendar/">
          <div><i class="far fa-calendar"></i></div>
        </a>
      </li>
    </ul>
    <hr style="margin-top: -10px;">

    <!-- matchs days table -->
    <table class="show_match">
      <?php
        include("../db_connection/pdo/conn.php");
        $req = $conn->query('SELECT * FROM matchs WHERE date(date_to_play)='.$date.'');
        

          while ($donnees = $req->fetch()){

             $played=$donnees['match_status'];
             

          if ($played=='FT') {
            ?>

            <!-- if match status is full time -->
            <tr class="tr_all" onclick="window.location='./football/match_datails.php?id=<?php echo htmlspecialchars($donnees['matchID']); ?>'">
                <td class="match_left"><?php echo htmlspecialchars($donnees['t_home']); ?></td>
                <td class="score_left"><button class="btn"><?php echo htmlspecialchars($donnees['score_t1']); ?></button></td>
                <td class="play_time"><button class="btn"><?php echo htmlspecialchars($donnees['match_status']); ?></button></td>
                <td class="score_right"><button class="btn"><?php echo htmlspecialchars($donnees['score_t2']); ?></button></td>
                <td class="match_right"><?php echo htmlspecialchars($donnees['t_away']); ?></td>
            </tr>
            <?php   
              }
              elseif ($played=='Live') {
                ?>
            <!-- If match is live -->
            <tr class="tr_all" onclick="window.location='./football/match_datails.php?id=<?php echo htmlspecialchars($donnees['matchID']); ?>'">
                <td class="match_left"><?php echo htmlspecialchars($donnees['t_home']); ?></td>
                <td class="score_left"><button class="btn"><?php echo htmlspecialchars($donnees['score_t1']); ?></button></td>
                <td class="play_time"><button class="btn"><?php echo htmlspecialchars($donnees['match_status']); ?></button></td>
                <td class="score_right"><button class="btn"><?php echo htmlspecialchars($donnees['score_t2']); ?></button></td>
                <td class="match_right"><?php echo htmlspecialchars($donnees['t_away']); ?></td>
            </tr>
            <?php
              }
            else {
            ?>

            <!-- If match not played -->
            <tr class="tr_all" onclick="window.location='./football/match_datails.php?id=<?php echo htmlspecialchars($donnees['matchID']); ?>'">
                <td class="match_left"><?php echo htmlspecialchars($donnees['t_home']); ?></td>
                <td class="score_left"><button class="btn"><?php echo htmlspecialchars($donnees['score_t1']); ?></button></td>
                <td class="play_time"><button class="btn"><?php echo htmlspecialchars($donnees['time_to_play']); ?></button></td>
                <td class="score_right"><button class="btn"><?php echo htmlspecialchars($donnees['score_t2']); ?></button></td>
                <td class="match_right"><?php echo htmlspecialchars($donnees['t_away']); ?></td>
            </tr>
            <?php
          } 
        }
      ?>
    </table>
  </div>
  <div class="post">
  <table class="table select-table">
     <?php 
        //select posts from database
        $conn = mysqli_connect("localhost", "root", "", "inkino_db");
        $query = mysqli_query($conn, "SELECT a.*,
                                             b.*
       
                                      FROM posts a, 
                                            admins b
                                                    
                                      WHERE a.adminID=b.adminID 
                                      ORDER BY a.postID DESC
                                                
                                      LIMIT 0, 6") 
                                      
                  or die(mysqli_error(mysql:$conn));
         while($fetch = mysqli_fetch_array($query)){


          $string = $fetch['contents'];
          $first_chars = substr($string, 0, 25);
          $postid = $fetch['postID'];
          
        ?>
        <tbody>
            <tr class="separator" style="cursor:pointer;" onclick="window.location='facebook.com?id=<?php echo htmlspecialchars($fetch['postID']); ?>'">
                <td>
                    <div class="d-flex">
                        <img style="width: 30px; height: 30px; margin-top: 10px;" class="img-sm rounded-10" src="<?php echo base_url;?>admin/blog/uploads/<?php echo htmlspecialchars($fetch['image']);?>" alt="users">
                        <div>
                            <h6><?php echo htmlspecialchars($fetch['title']); ?></h6>
                            <p><?php echo htmlspecialchars($first_chars); ?> ...</p>
                        </div>
                    </div>
                </td>
                <td>
                    <div class="badge badge-opacity-success"><img class="view" src="../images/images/view.png" alt=""></div>
                </td>
                <td></td>
            </tr>
        </tbody>
        <?php 
         }  
      ?>
    </table>
  </div>
 </div>
</div>
<?php 
  include(Root_path."./include/footer.php");
?>
