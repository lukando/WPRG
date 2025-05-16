<?php
class Product{
    public $name;
    public $price;
    public $quantity;

    public function __construct($name,$price,$quantity){
        $this->name=$name;
        $this->price=$price;
        $this->quantity=$quantity;
    }

    public function getName(){
        return $this->name;
    }
    public function setName($name){
        $this->name = $name;
    }

    public function getPrice(){
        return $this->price;
    }
    public function setPrice($price){
        $this->price = $price;
    }

    public function getQuantity(){
        return $this->quantity;
    }
    public function setQuantity($quantity){
        $this->quantity = $quantity;
    }

    public function __toString(){
        $odp = "Product: " . $this->name . ", Price: " . $this->price . ", Quantity: " . $this->quantity;
        return $odp;
    }
}

$telefony = new Product("Iphone", 3000, 100);
echo $telefony->__toString() . "\n";
echo $telefony->getPrice() . "\n";
$telefony->setQuantity(200);
echo $telefony->getQuantity() . "\n";

class Cart{
    private $products;
    public function __construct(){
        $this->products = [];
    }
    public function addProduct(Product $product){
        foreach($this->products as $oneProduct){
            if($oneProduct->getName() == $product->getName()){
                $oneProduct->setQuantity($oneProduct->getQuantity() + $product->getQuantity());
                return;
            }
        }
        $this->products[] = $product;
    }

    public function removeProduct(Product $product) {
        foreach ($this->products as $index => $oneProduct) {
            if ($oneProduct->getName() === $product->getName()) {
                unset($this->products[$index]);
                $this->products = array_values($this->products);
                return;
            }
        }
    }

    public function getTotal(){
        $total = 0;
        foreach($this->products as $oneProduct){
            $total += $oneProduct->getPrice() * $oneProduct->getQuantity();
        }
        return $total;
    }

    public function __toString(){
        $odp = "Produkty w koszyku:\n";
        foreach($this->products as $oneProduct){
            $odp .= $oneProduct . "\n";
        }
        $odp .= "Total price:\n" . $this->getTotal();
        return $odp;
    }
}

$koszyk = new Cart();
$koszyk->addProduct($telefony);
$komputery = new Product("Lenovo", 5000, 100);
$komputery2 = new Product("Lenovo", 5000, 25);
$koszyk->addProduct($komputery);
$koszyk->addProduct($komputery2);

echo $koszyk->__toString() . "\n";
$koszyk->removeProduct($komputery2);
echo $koszyk->__toString() . "\n";
?>
