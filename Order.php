<?php

class Order {
    public $id;
    public $customerName;
    public $status = "cart";
    public $totalPrice;
    public $products = [];

    public function addProduct() {
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

$order1 = new Order();
$order1->addProduct();
$order1->addProduct();
$order1->addProduct();
$order1->pay();



var_dump($order1);

