<?php

interface Animal{
    public function makeSound();
    public function eat();
}

class Dog implements Animal{
    public function makeSound(){
        return "Woof!";
    }
    public function eat(){
        return "The dog is eating.";
    }
}


$owczarek = new Dog;
echo $owczarek->makeSound() . "\n";
echo $owczarek->eat() . "\n";
?>