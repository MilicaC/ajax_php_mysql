<?php
include 'konekcija.php';
include 'boja.php';
include 'materijal.php';
include 'dekort.php';


if(isset($_GET['operacija']) && $_GET['operacija']=='materijal'){
  $rezultat = $konekcija->query('SELECT * FROM materijal');

  $materijali = [];
  while($red = $rezultat->fetch_assoc()) {
    $materijal = new Materijal();
    $materijal->setMaterijalID($red['materijalID']);
    $materijal->setNazivMaterijala($red['nazivMaterijala']);
    array_push($materijali, $materijal);
    }
    //var_dump($materijali);
    echo(json_encode($materijali));
}

if(isset($_GET['operacija']) && $_GET['operacija']=='boja'){
  $rezultat = $konekcija->query('SELECT * FROM boja');

  $boje = [];
  while($red = $rezultat->fetch_assoc()) {
    $boja = new Boja();
    $boja->setBojaID($red['bojaID']);
    $boja->setBoja($red['boja']);
    array_push($boje, $boja);
    }
    echo(json_encode($boje));
}

if(isset($_GET['operacija']) && $_GET['operacija']=='dekor'){
  $rezultat = $konekcija->query('SELECT * FROM dekort d join boja b on d.bojaID=b.bojaID join materijal m on d.materijalID=m.materijalID');

  $niz = [];
  while($red = $rezultat->fetch_assoc()) {
    $boja = new Boja();
    $boja->setBojaID($red['bojaID']);
    $boja->setBoja($red['boja']);

    $materijal = new Materijal();
    $materijal->setMaterijalID($red['materijalID']);
    $materijal->setNazivMaterijala($red['nazivMaterijala']);

    $dekort = new Dekort();


    $dekort->setDekorID($red['dekorID']);
    $dekort->setNaziv($red['naziv']);
    $dekort->setVelicina($red['velicina']);
    $dekort->setCena($red['cena']);
    $dekort->setSlika($red['slika']);
    $dekort->setBoja($boja);
    $dekort->setMaterijal($materijal);

    array_push($niz, $dekort);
    }
    echo(json_encode($niz));
}
if(isset($_POST['sacuvaj'])){
  $folder = "img/";
  $fajl = $folder . basename($_FILES["file"]["name"]);

  if (move_uploaded_file($_FILES["file"]["tmp_name"], $fajl)) {
      $naziv = trim($_POST['naziv']);
      $velicina = trim($_POST['velicina']);
      $cena = trim($_POST['cena']);
      $boja = trim($_POST['boja']);
      $materijal = trim($_POST['materijal']);
      $nazivSlike = basename($_FILES["file"]["name"]);

      if($konekcija->query("INSERT into dekort(naziv,velicina,cena,slika,materijalID,bojaID) VALUES ('$naziv','$velicina',$cena,'$nazivSlike',$materijal,$boja)")){
        header("Location: index.php");
      }else{
        echo("Neuspesan unos");
      }

  }else{
    echo("Neuspesno prebacivanje slike");
  }
}

if(isset($_POST['izmeni'])){

      $dekort = trim($_POST['dekor']);
      $cena = trim($_POST['cena']);

      if($konekcija->query("UPDATE dekort SET cena=$cena WHERE dekorID=$dekort")){
        header("Location: index.php");
      }else{
        echo("Neuspesana izmena");
      }
}

if(isset($_POST['obrisi'])){

      $dekort = trim($_POST['dekor']);

      if($konekcija->query("DELETE FROM dekort WHERE dekorID=$dekort")){
        header("Location: index.php");
      }else{
        echo("Neuspesano brisanje");
      }
}
if(isset($_GET['operacija']) && $_GET['operacija']=='pretragaSortiranje'){

  $pretraga = $_GET['pretraga'];
  $sortiranje = $_GET['sortiranje'];
  $sql = "SELECT * FROM dekort d join boja b on d.bojaID=b.bojaID join materijal m on d.materijalID=m.materijalID where d.naziv LIKE '%".$pretraga."%' order by cena ".$sortiranje;
  //echo($sql);
  $rezultat = $konekcija->query($sql);

  $niz = [];
  while($red = $rezultat->fetch_assoc()) {
    $boja = new Boja();
    $boja->setBojaID($red['bojaID']);
    $boja->setBoja($red['boja']);

    $materijal = new Materijal();
    $materijal->setMaterijalID($red['materijalID']);
    $materijal->setNazivMaterijala($red['nazivMaterijala']);

    $dekort = new Dekort();


    $dekort->setDekorID($red['dekorID']);
    $dekort->setNaziv($red['naziv']);
    $dekort->setVelicina($red['velicina']);
    $dekort->setCena($red['cena']);
    $dekort->setSlika($red['slika']);
    $dekort->setBoja($boja);
    $dekort->setMaterijal($materijal);

    array_push($niz, $dekort);
    }
    echo(json_encode($niz));
}


 ?>
