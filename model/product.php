<?php
class Product
{
  public $id;
  public $name;
  public $price;
  public $description;

  public function __construct($data)
  {
    $this->id = $data['id'];
    $this->name = $data['NAME'];
    $this->price = $data['price'];
    $this->description = $data['descr'];
  }
}
