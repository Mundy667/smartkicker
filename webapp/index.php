<?php
	include "php/inc/version.php";
?>
<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SmartKicker</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/2-col-portfolio.css" rel="stylesheet">
<script src="js/jquery.min.js"></script>
<link rel="stylesheet" type="text/css" href="js/jquery.dataTables.css">
<script type="text/javascript" charset="utf8" src="js/jquery.dataTables.js"></script>
  </head>

  <body>

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
      <div class="container">
        <a class="navbar-brand" href="#"><img src="netapp.png">&nbsp;&nbsp;Technologie Forum Rhein/Main -- Smartkicker</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
              <a class="nav-link" href="#">Home
                <span class="sr-only">(current)</span>
              </a>
            </li>
            <li class="nav-item active">
              <a class="nav-link" href="php/setNewGame.php">New Game
                <span class="sr-only">(current)</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">About</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <!-- Page Content -->
    <div class="container">
	<div class="my-4" align="right"><p><a class="btn btn-primary" href="/php/setNewGame.php" role="button">Starte ein neues Spiel</a>
<a class="btn btn-danger" href="/php/deleteLastTor.php" role="button">l&ouml;sche letztes Tor</a></p></div>
<script type="text/javascript">
    $(document).ready(function(){
      refreshTable2();
    });

    function refreshTable2(){
        $('#currentGame').load('/php/getCurrentGame.php', function(){
           setTimeout(refreshTable2, 1000);
        });
    }
</script>
      <!-- Page Heading !-->
      <h1 class="my-4">Smartkicker
        <small id="currentGame"></small>
      </h1>
	
      <div class="row">
        <div class="col-lg-6 portfolio-item">
          <div class="card h-100">
            <a href="#"></a>
            <div class="card-body">
              <h4 class="card-title">
                <a href="#">Aktueller Spielstand</a>
              </h4>
              <p class="card-text"><h1 style="font-size:200px" align="center" id="tableHolder"></h1></p>
<script type="text/javascript">
    $(document).ready(function(){
      refreshTable();
    });

    function refreshTable(){
        $('#tableHolder').load('/php/getGameResult.php', function(){
           setTimeout(refreshTable, 1000);
        });
    }
</script>



            </div>
          </div>
        </div>
        <div class="col-lg-6 portfolio-item">
          <div class="card h-100">
            <a href="#"></a>
            <div class="card-body">
              <h4 class="card-title">
                <a href="#">Letzte Spiele</a>
              </h4>
              <p class="card-text" id="currentTable">
<script type="text/javascript">
    $(document).ready(function(){
      refreshTable3();
    });

    function refreshTable3(){
        $('#currentTable').load('/php/getTableResult.php', function(){
           setTimeout(refreshTable3, 1000);
        });
    }
</script>	    
	      </p>
            </div>
          </div>
        </div>
      </div>
      <!-- /.row -->

    </div>
    <!-- /.container -->

    <!-- Footer -->
    <footer class="py-5 bg-dark">
      <div class="container">
        <p class="m-0 text-center text-white">Copyright &copy; NetApp - District Frankfurt
	<small class="m-0 text-grey"> ( Version: <?php echo $version; ?> )</small></p>
      </div>
      <!-- /.container -->
    </footer>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  </body>

</html>
