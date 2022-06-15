<?php
require_once __DIR__ . "/Product.php";
class Food extends Product{
  public $brand;
  public $type;
  public $weight;
  public $expireDate;

  function __construct($_name, $_brand, $_type, $_weight, $_expireDate, $_price)
  {
    parent::__construct($_name, $_price);
    $this->brand = $_brand;
    $this->type = $_type;
    $this->weight = $_weight;
    $this->expireDate = $_expireDate;
  }

  public function printInfo() {
    return "$this->nome" . " - " . "$this->brand" . ", " . "$this->type" . ", " . "$this->weight" . ", " . "$this->expireDate" . ", " . "€ $this->price";
  }
}
?>