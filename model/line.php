<?php

class Line
{
  private $id;
  private $id_order;
  private $id_product;
  private $quantity;

  public function __construct($data)
  {
    $this->id = $data['id'];
    $this->id_order = $data['id_order'];
    $this->id_product = $data['id_product'];
    $this->quantity = $data['quantity'];
  }
  public function getProduct()
  {
    $db = Conectar::conexion();
    $q = "SELECT * FROM product WHERE id = $this->id_product";
    $result = $db->query($q);
    $data = $result->fetch_assoc();
    return new Product($data);
  }
  public function getId()
  {
    return $this->id;
  }
  public function getIdOrder()
  {
    return $this->id_order;
  }
  public function getIdProduct()
  {
    return $this->id_product;
  }
  public function getQuantity()
  {
    return $this->quantity;
  }
}
