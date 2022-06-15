<?php
class Product {
  public $name;
  public $prezzo;
  public $available = true;

  function __construct($_name, $_price) {
    $this->name = $_name;
    $this->price = $_price;
  }

  public function printInfo() {
    return "$this->nome" . " - " . "€ $this->price";
  }
}
?>