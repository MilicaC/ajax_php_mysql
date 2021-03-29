<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Kreator - Lana</title>
  <meta name="description" content="">
  <meta name="keywords" content="">

  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:400,300|Raleway:300,400,900,700italic,700,300,600">
  <link rel="stylesheet" type="text/css" href="css/jquery.bxslider.css">
  <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="css/animate.css">
  <link rel="stylesheet" type="text/css" href="css/style.css">
</head>

<body>

  <div class="loader"></div>
  <div id="myDiv">
    <?php include 'heder.php'; ?>



    <section id="blog" class="section-padding wow fadeInUp delay-05s">
      <div class="container">
        <div class="row">
          <div class="col-md-12 text-center">
            <h2 class="service-title pad-bt15">Dekoracije</h2>
            <p class="sub-title pad-bt15">Pronađite baš ono<br>kšto savršeno pristaje vašem domu</p>
            <hr class="bottom-line">
          </div>
          <form method="post" action="kontroler.php" >
            <label for="odeca">Dekoracije</label>
            <select class="form-control" name="dekor" id="dekor"></select>
            <label for="submit"></label>
            <input class="form-control btn-default" type="submit" value="Obrisi" name="obrisi">
          </form>

      </div>
      </div>
    </section>
    <?php include 'futer.php'; ?>

  </div>
  <script src="js/jquery.min.js"></script>
  <script src="js/jquery.easing.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/wow.js"></script>
  <script src="js/jquery.bxslider.min.js"></script>
  <script src="js/custom.js"></script>
  <script>
      function vratiDekoraciju(){
        $.ajax({
          url: "kontroler.php",
          data: "operacija=dekor",
          success: function(data){
            var text='';
            $.each(JSON.parse(data),function(i,val){
              text+='<option value="'+val.dekorID+'">'+val.naziv+'</option>';
            });
            $("#dekor").html(text);
          }
        });
      }
  </script>

  <script>
  vratiDekoraciju();
  </script>
</body>
</html>
