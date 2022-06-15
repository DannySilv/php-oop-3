<?php
require_once __DIR__ . "/Address.php";

class User {
  use Address;
  public $name;
  public $email;
  public $paymentAcceptable;
  public $registered = false;
  public $cart = [];

  function __construct($_name, $_email, $_paymentAcceptable) {
    $this->name = $_name;
    $this->email = $_email;
    $this->paymentAcceptable = $_paymentAcceptable;
  }
  
  public function toCart($_product) {
    if ($_product->available) {
      $this->cart[] = $_product;
    } else {
      throw new Exception("Ci dispiace, " . $_product->name . " non è in magazzino!");
    }
  }

  public function register() {
    $this->registered = true;
    return "Benvenuto " . "$this->name" . "! Ora sei registrato e potrai accedere ai nostri sconti!";
  }

  public function getTotal() {
    $total = 0;
    foreach($this->cart as $element) {
      $total += $element->price;
      if ($this->registered) {
        return $total * 0.8;
      } else {
        return $total;
      }
    }
  }

  public function isPaymentExpired() {
    return $this->paymentAcceptable;
  }
}
?>