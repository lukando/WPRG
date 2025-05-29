<?php

trait Speed{
    private $speed;
    public function increaseSpeed($wartosc){
        $this->speed += $wartosc;
    }

    public function decreaseSpeed($wartosc){
        $this->speed -= $wartosc;
        if($this->speed < 0){
            $this->speed = 0;
        }
    }

    public function getSpeed(){
        return $this->speed;
    }
}

class Car {
    use Speed;

    public function start(){
        $this->speed = 0;
        $this->increaseSpeed(10);
    }
}


$car = new Car();
$car->start();
echo "Aktualna prędkość: " . $car->getSpeed() . "\n";
$car->increaseSpeed(100);
echo "Aktualna prędkość: " . $car->getSpeed() . "\n";
$car->increaseSpeed(100);
echo "Aktualna prędkość: " . $car->getSpeed() . "\n";
$car->decreaseSpeed(50);
echo "Aktualna prędkość: " . $car->getSpeed() . "\n";
$car->decreaseSpeed(5000);
echo "Aktualna prędkość: " . $car->getSpeed() . "\n";
?>