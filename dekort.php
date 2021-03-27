<?php
class Dekort{

	public $dekorID;
	public $naziv;
  public $velicina;
  public $cena;
  public $slika;
  public $boja;
  public $materijal;

  public function getDekorID(){
    return $this->dekorID;
  }

  public function setDekorID($dekorID){
    $this->dekorID = $dekorID;
  }

  public function getNaziv(){
    return $this->naziv;
  }

  public function setNaziv($naziv){
    $this->naziv = $naziv;
  }

  public function getVelicina(){
    return $this->velicina;
  }

  public function setVelicina($velicina){
    $this->velicina = $velicina;
  }

  public function getCena(){
    return $this->cena;
  }

  public function setCena($cena){
    $this->cena = $cena;
  }

  public function getSlika(){
    return $this->slika;
  }

  public function setSlika($slika){
    $this->slika = $slika;
  }

  public function getBoja(){
    return $this->boja;
  }

  public function setBoja($boja){
    $this->boja = $boja;
  }

  public function getMaterijal(){
    return $this->materijal;
  }

  public function setMaterijal($materijal){
    $this->materijal = $materijal;
  }

}


 ?>
