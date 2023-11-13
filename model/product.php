<?php
class Product
{
  private $id;
  private $name;
  private $price;
  private $description;

  public function __construct($data)
  {
    $this->id = $data['id'];
    $this->name = $data['NAME'];
    $this->price = $data['price'];
    $this->description = $data['descr'];
  }
  public function getId()
  {
    return $this->id;
  }
  public function getName()
  {
    return $this->name;
  }
  public function getPrice()
  {
    return $this->price;
  }
  public function getDescription()
  {
    return $this->description;
  }
}
