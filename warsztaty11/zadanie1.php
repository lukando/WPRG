<?php

class  NoweAuto {
    public $modelAuta;
    public $cenaWEuro;
    public $aktualnyKursEuro;
    public function __construct($modelAuta, $cenaWEuro, $aktualnyKursEuro) {
        $this->modelAuta = $modelAuta;
        $this->cenaWEuro = $cenaWEuro;
        $this->aktualnyKursEuro = $aktualnyKursEuro;
    }
    public function wypiszDane(){
        echo $this->modelAuta . "\n";
        echo $this->cenaWEuro . "\n";
        echo $this->aktualnyKursEuro . "\n";
    }
    public function ObliczCene(){
        return $this->cenaWEuro * $this->aktualnyKursEuro;
    }
}

class AutoZDodatkami extends NoweAuto {
    public $alarm;
    public $radio;
    public $klimatyzacja;
    public function __construct($alarm, $radio, $klimatyzacja, $modelAuta, $cenaWEuro, $aktualnyKursEuro) {
        parent::__construct($modelAuta, $cenaWEuro, $aktualnyKursEuro);
        $this->alarm = $alarm;
        $this->radio = $radio;
        $this->klimatyzacja = $klimatyzacja;
    }
    public function wypiszDane(){
        parent::wypiszDane();
        echo $this->alarm . "\n";
        echo $this->radio . "\n";
        echo $this->klimatyzacja . "\n";
    }

    public function ObliczCene(){
        $cenaSamegoAuta = parent::ObliczCene();
        return $cenaSamegoAuta + (($this->klimatyzacja + $this->alarm + $this->radio) * $this->aktualnyKursEuro);
    }
}

class Ubezpieczenie extends AutoZDodatkami {
    public $procentowaWartoscUbezpieczenia;
    public $liczbaLatPosiadaniaSamochodu;

    public function __construct($procentowaWartoscUbezpieczenia, $liczbaLatPosiadaniaSamochodu, $alarm, $radio, $klimatyzacja, $modelAuta, $cenaWEuro, $aktualnyKursEuro) {
        parent::__construct($alarm, $radio, $klimatyzacja, $modelAuta, $cenaWEuro, $aktualnyKursEuro);
        $this->procentowaWartoscUbezpieczenia = $procentowaWartoscUbezpieczenia;
        $this->liczbaLatPosiadaniaSamochodu = $liczbaLatPosiadaniaSamochodu;
    }

    public function ObliczCene() {
        $cenaAutaZDodatkami = parent::ObliczCene();
        $wartoscPoZnizce = $cenaAutaZDodatkami * ((100 - $this->liczbaLatPosiadaniaSamochodu) / 100);
        $ubezpieczenie = $this->procentowaWartoscUbezpieczenia * $wartoscPoZnizce;
        return $ubezpieczenie;
    }
}

$auto1 = new NoweAuto("BMW", 9999, 4.24);
$auto1->wypiszDane();
echo $auto1->ObliczCene();
echo "\n";
echo "\n";


$auto2 = new AutoZDodatkami(299.99, 399.99, 159.99, "Mercedes W124", 7999.99, 4.24);
$auto2->wypiszDane();
echo $auto2->ObliczCene();
echo "\n";
echo "\n";


$auto3 = new Ubezpieczenie(0.02, 10, 129.99, 59.99, 89.99, "Audi", 14999.99, 4.23);
$auto3->wypiszDane();
echo $auto3->ObliczCene();
?>