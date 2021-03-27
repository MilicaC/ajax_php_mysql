<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Dekor-Plus</title>
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
            <p class="sub-title pad-bt15">Pronađite baš ono <br>što savršeno pristaje vašem domu</p>
            <hr class="bottom-line">
          </div>
          <form method="post" action="kontroler.php" enctype="multipart/form-data">
            <label for="naziv">Naziv</label>
            <input type="text" id="naziv" name="naziv" placeholder="Unesite naziv dekoracije" class="form-control">
            <label for="cena">Cena</label>
            <input type="text" id="cena" name="cena" placeholder="Unesite cenu dekoracije" class="form-control">
            <label for="velicina">Velicina</label>
            <textarea id="velicina" rows="6" name="velicina" placeholder="Unesite velicinu dekoracije" class="form-control"></textarea>
            <label for="file">Slika</label>
            <input class="form-control" type="file" name="file" id="file" class="form-control">
            <label for="materijal">Materijal</label>
            <select class="form-control" name="materijal" id="materijal"></select>
            <label for="boja">Boja</label>
            <select class="form-control" name="boja" id="boja"></select>
            <label for="submit"></label>
            <input class="form-control btn-default" type="submit" value="Sacuvaj" name="sacuvaj">
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
      function vratiMaterijale(){
        $.ajax({
          url: "kontroler.php",
          data: "operacija=materijal",
          success: function(data){
            var text='';
            $.each(JSON.parse(data),function(i,val){
              text+='<option value="'+val.materijalID+'">'+val.nazivMaterijala+'</option>';
            });
            $("#materijal").html(text);
          }
        });
      }
  </script>
  <script>
      function vratiBoje(){
        $.ajax({
          url: "kontroler.php",
          data: "operacija=boja",
          success: function(data){
            var text='';
            $.each(JSON.parse(data),function(i,val){
              text+='<option value="'+val.bojaID+'">'+val.boja+'</option>';
            });
            $("#boja").html(text);
          }
        });
      }
  </script>
  <script>
  vratiMaterijale();
  vratiBoje();
  </script>
</body>
</html>
