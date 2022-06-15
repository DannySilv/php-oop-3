<?php
require_once __DIR__ . "/Product.php";
class Kennels extends Product{
  public $material;
  public $size;
  public $purpose;

  function __construct($_name, $_material, $_size, $_purpose, $_price)
  {
    parent::__construct($_name, $_price);
    $this->material = $_material;
    $this->size = $_size;
    $this->purpose = $_purpose;
  }

  public function printInfo() {
    return "$this->name" . " - " . "$this->material" . ", " . "$this->size" . ", " . "$this->purpose" . " - " . "€ $this->price";
  }
}
?>