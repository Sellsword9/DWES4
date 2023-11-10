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

  public function addLine($idProduct)
  {
    $db = Conectar::conexion();
    $q = "INSERT INTO line (id_order, id_product) VALUES ($this->id, $idProduct)";
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
}
