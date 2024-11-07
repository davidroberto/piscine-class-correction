<?php


class Order {
    public $id;
    public $customerName;
    public $status;
    public $totalPrice;
    public $products = [];
    public $shippingAddress;


    // le constructeur est une méthode "magique"
    // car elle est appelée automatiquement
    // le constructeur est appelée quand un objet est créé
    // pour cette classe
    // un objet créé pour une classe est appelée "instance de class"
    public function __construct($customerName) {
        $this->status === 'cart';
        $this->totalPrice = 0;
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

    public function removeProduct() {

        if ($this->status === "cart" && !empty($this->products)) {
            array_pop($this->products);
            $this->totalPrice -= 3;
        }
    }

    public function setShippingAddress($shippingAddress) {
        if ($this->status === "cart") {
            $this->shippingAddress = $shippingAddress;
            $this->status === "shippingAddressSet";
        }
    }

    public function pay() {
        if($this->status === "shippingAddressSet" && !empty($this->products)) {
            $this->status = "paid";
        } else {
            // si le paiement ne peux pas être fait
            // on lève une exception, c'est à dire on déclenche une erreur
            // que l'on peut récupérer ensuite pour l'afficher dans le HTML
            throw new Exception('Vous ne pouvez pas payer, merci de remplir votre adresse d\'abord');
        }

    }


    public function ship() {
        if ($this->status === 'paid') {
            $this->status = "shipped";
        } else {
            throw new Exception("La commande ne peux pas être expédiée. elle n'est pas encore payée");
        }
    }
}

// je créé un objet


// je créé une instance de la classe Order
// c'est à dire un objet issu du plan de construction de la classe Order
$order1 = new Order("David Robert");

$order1->ship();





