<?php 
require_once __DIR__ . "/Address.php";

class Fornitore {
  use Address;  
  public $name;
  public $merchandise;
  public $p_iva;
}