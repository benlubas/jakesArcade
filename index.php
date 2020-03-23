<!DOCTYPE html>
<html>

<head>
  <?php include("includes/cdns.php"); ?>
  <?php include("includes/connection.php"); ?>
</head>

<body>
  <header class='bg-black text-center text-primary'>
    <h1 id='title'>Jake's 20% Arcade</h1>
  </header>
  <div id='bar' class='bg-yellow'></div>

  <div class='container'>
    <div class='row'>

      <div class="card bg-yellow">
        <div class='flip-card-front'>
          <div class="img-cont">
            <img class="card-img-top" src="img/ph.jpeg" alt="Card image cap" />
            <div class='overlay'>Play</div>
            </div>
              <div class="card-body">
                <h5 class="card-title text-primary">Minesweeper</h5>
                <p class="card-text text-secondary">Click the safe tiles to clear the mines from the field</p>
                <div class='hs-btn'>Highscores</div>
              </div>
              
            </div>
            <div class='flip-card-back'>
              <div class="card-body">
                <h5 class="card-title text-primary">High Scores</h5>
                <p class="card-text text-secondary">
                  <ol class='text-secondary'>
                    <li>Jake <span class='score'>100</span></li>
                    <li>Noah <span class='score'>90</span></li>
                    <li>Ben <span class='score'>80</span></li>
                    <li>Ohm <span class='score'>70</span></li>
                    <li>Jayson <span class='score'>60</span></li>
                    <li>Jake <span class='score'>50</span></li>
                    <li>Noah <span class='score'>40</span></li>
                    <li>Ben <span class='score'>30</span></li>
                    <li>Ohm <span class='score'>20</span></li>
                    <li>Jayson <span class='score'>10</span></li>
                </ol>
              </p>
              <span class='detailsBtn'>Details</span>
            </div>
          </div>
        </div>
      </div>
        
        
      <div id="ins-modal" class="modal fade" role="dialog">
        <div class="modal-dialog">

          <!-- Modal content-->
          <div class="modal-content">
            <div class="ins-modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="ins-modal-title text-primary">Minesweeper Instructions</h4>
            </div>
            <div class="ins-modal-body">
              <p>These are some sample instructions for minesweeper</p>
            </div>
            <div class="ins-modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
          </div>

        </div>
      </div>
      <button class='ins-modal-btn'>Modal</button>
    </div>
  </div>

  <script>
      $(document).ready(function() {
          console.log("READY");
          $('.hsBtn').on("click",function(){
            $('.flip-card-front').toggle();
            $('.flip-card-back').toggle();
          })
          $('.detailsBtn').on("click",function(){
            $('.flip-card-front').toggle();
            $('.flip-card-back').toggle();
          })
          
          $('.ins-modal-btn').on("click",function(){
              $('#ins-modal').modal('show');
          })
      })
  </script>
</body>

</html>