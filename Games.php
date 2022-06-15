<?php
require_once __DIR__ . "/Product.php";
class Games extends Product{
  public $material;
  public $size;

  function __construct($_name, $_material, $_size, $_price)
  {
    parent::__construct($_name, $_price);
    $this->material = $_material;
    $this->size = $_size;
  }

  public function printInfo() {
    return "$this->nome" . " - " . "$this->material" . ", " . "$this->size" . " - " . "€ $this->price";
  }
}
?>