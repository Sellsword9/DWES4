<?php

class Order
{
  public $id;
  public $user_id;
  public $status;

  public function __construct($data)
  {
    $this->id = $data['id'];
    $this->user_id = $data['user_id'];
    $this->status = $data['status'];
  }

  public function addLine($data)
  {
    $idProduct = $data['id'];
    $quantity = $data['quantity'];
    $db = Conectar::conexion();
    $q = "INSERT INTO line (id_order, id_product, quantity) VALUES ($this->id, $idProduct, $quantity)";
    $db->query($q);
  }

  public function getLines()
  {
    $db = Conectar::conexion();
    $q = "SELECT * FROM line WHERE id_order = $this->id";
    $result = $db->query($q);
    $lines = [];
    while ($data = $result->fetch_assoc()) {
      $lines[] = new Line($data);
    }
    return $lines;
  }
  public function hasSomething(): bool
  {
    $db = Conectar::conexion();
    $q = "SELECT count(*) FROM line WHERE id_order = $this->id ";
    $result = $db->query($q);
    $data = $result->fetch_assoc();
    return $data['count(*)'] > 0;
  }
}
