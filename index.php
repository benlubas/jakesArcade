<?php session_start(); ?>
<!DOCTYPE html>
<html>

<head>
  <?php
    include("includes/cdns.php"); 
    include("includes/connection.php");
  ?>
</head>

<body>
  <header class='bg-black text-center text-primary'>
    <h1 id='title'>Jake's 20% Arcade</h1>
  </header>
  <div id='bar' class='bg-yellow'></div>

  <div class='container'>
    <div class='row'>

    <?php
    $sql = "SELECT * FROM games;";
    $res = $con -> query($sql);
    while($row = $res -> fetch_assoc()){
      $title = $row['title'];
      $description = $row['description'];
      $link = $row['link'];
      $hs = array();
      $hsu = array();
      $sql = "SELECT * FROM highscores WHERE game='$link' order by score DESC LIMIT 10;";
      $res = $con -> query($sql);
      while($row = $res -> fetch_assoc()){
        $user = $row['username'];
        $score = $row['score'];
        array_push($hs,$score);
        array_push($hsu,$user);
      }
      $html = "";
      for($i = 0; $i < sizeof($hs); $i++) {
        $html = $html."<li><div><p>$hsu[$i]</p> <p class='score'>$hs[$i]</p></div></li>";
      }
      echo "
        <div class='card bg-yellow' id='$link'>
          <div class='card-front'>
            <div class='img-cont'>
              <img class='card-img-top' src='img/ph.jpeg' alt='Card image cap' />
              <div class='overlay'>Play</div>
            </div>
            <div class='card-body'>
              <h5 class='card-title text-primary title'>$title</h5>
              <p class='card-text text-secondary description'>$description</p>
            </div>
            <div class='card-btns'>
              <div class='btn instructions'>Instructions</div> <br />
              <div class='flip btn'>Highscores</div>
            </div>
          </div>
          <div class='card-back hide'>
            <div class='card-body'>
              <h5 class='card-title text-primary'>High Scores</h5>
              <div class='text-secondary'>
                <ol class='text-secondary hs'>
                  $html
                </ol>
              </div>
            </div>
            <div class='card-btns'>
              <div class='flip btn'>Details</div>
            </div>
          </div>
        </div>
        ";
      }
      ?>
    </div><!-- end row -->
    
    <div id='ins-modal' class="modal fade" role="dialog">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="md-header">
            <h4 class="text-primary" id='ins-modal-title'>Minesweeper Instructions</h4>
          </div>
          <div class='modal-body'>
            <p id='ins-modal-instructions'>These are some sample instructions for minesweeper</p>
          </div>
          <div class="md-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script>
      $(document).ready(function() {
          $('.flip').on("click",function(){
            $('.card-front').toggleClass("hide");
            $('.card-back').toggleClass("hide");
          })
          
          $('.ins-modal-btn').on("click",function(){
              $('#ins-modal').modal('show');
          })
          $('.instructions').on("click", async function(){
            $link = $(this).parent().parent().parent().attr("id");
            $.ajax({
                type: "POST",
                url: "scripts/getInstructions.php",
                data: {
                    link:$link,
                },
                success: function(res) {
                  $title = res.split('12#$5')[0];
                  $instructions = res.split('12#$5')[1];
                  $('#ins-modal-title').text($title+" Instructions");
                  $('#ins-modal-instructions').text($instructions);
                  $('#ins-modal').modal('show');
                }, 
                errer: e => {
                  console.error(e);
                } 
            });


          })
      })
  </script>
</body>

</html>