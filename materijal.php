<?php
class Materijal{

	public $materijalID;
	public $nazivMaterijala;

  public function getMaterijalID(){
		return $this->materijalID;
	}

	public function setMaterijalID($materijalID){
		$this->materijalID = $materijalID;
	}

	public function getNazivMaterijala(){
		return $this->nazivMaterijala;
	}

	public function setNazivMaterijala($nazivMaterijala){
		$this->nazivMaterijala = $nazivMaterijala;
	}

}


 ?>
