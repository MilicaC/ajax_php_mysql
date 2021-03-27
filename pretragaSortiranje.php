<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Dekor-plus</title>
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
            <p class="sub-title pad-bt15">Pronađite baš ono
<br>što savršeno pristaje vašem domu</p>
            <hr class="bottom-line">
          </div>
          <label for="naziv">Naziv</label>
          <input type="text" id="naziv" name="naziv" placeholder="Unesite naziv dekoracije" class="form-control">
          <label for="sortiranje">Sortiranje</label>
          <select class="form-control" name="sortiranje" id="sortiranje">
            <option value="asc">Rastuce</option>
            <option value="desc">Opadajuce</option>
          </select>
          <label for="submit"></label>
          <input onclick="unesiPodatke()" class="form-control btn-default" type="button" value="Pretrazi">
          <br><br>
          <div id="podaci">
          </div>
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
      function unesiPodatke(){
        var pretraga = $("#naziv").val();
        var sortiranje = $("#sortiranje").val();
        $.ajax({
          url: "kontroler.php",
          data: "operacija=pretragaSortiranje&pretraga="+pretraga+"&sortiranje="+sortiranje,
          success: function(data){
            var text='';
            $.each(JSON.parse(data),function(i,val){
              text+='<div class="col-md-4 col-sm-6 col-xs-12">';
              text+='<div class="blog-sec">';
              text+='<div class="blog-img">';
              text+='<a href="">';
              text+='  <img src="img/'+val.slika+'" class="img-responsive">';
              text+='</a>';
              text+='</div>';
              text+='<div class="blog-info">';
              text+='<h2>'+val.naziv+'</h2>';
              text+='<div>';
              text+='  <p>Materijal: '+val.materijal.nazivMaterijala+'</p>';
              text+='  <p>Boja: '+val.boja.boja+'</p>';
              text+='  <p>Cena: '+val.cena+' &euro;</p>';
              text+='</div>';
              text+='<p>'+val.velicina+'</p>';
              text+='</div>';
              text+='</div>';
              text+='</div>';
            });
            $("#podaci").html(text);
          }
        });
      }
  </script>
  <script>
  unesiPodatke();
  </script>

</body>
</html>
