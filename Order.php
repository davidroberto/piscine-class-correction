<?php


class Order {
    public $id;
    public $customerName;
    public $status = "cart";
    public $totalPrice;
    public $products = [];


    // le constructeur est une méthode "magique"
    // car elle est appelée automatiquement
    // le constructeur est appelée quand un objet est créé
    // pour cette classe
    // un objet créé pour une classe est appelée "instance de class"
    public function __construct($customerName) {
        $this->customerName = $customerName;
        $this->id = uniqid();
    }

    public function addProduct() {
        // le $this fait référence à l'objet actuel
        // c'est à dire à $order1, ou $order2 etc
        // donc à l'objet actuel issu de la classe
        if ($this->status === "cart") {
            $this->products[] = "Pringles";
            $this->totalPrice += 3;
        }
    }

    public function pay() {
        if($this->status === "cart") {
            $this->status = "paid";
        }
    }
}

// je créé un objet


// je créé une instance de la classe Order
// c'est à dire un objet issu du plan de construction de la classe Order
$order1 = new Order("David Robert");
$order1->addProduct();
$order1->addProduct();
$order1->addProduct();

$order2 = new Order();
$order2->addProduct();


$order1->pay();




