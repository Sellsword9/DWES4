<?php
class LineRepo
{
  public static function addLine($idOrder, $data)
  {
    $idProduct = $data['id_product'];
    $quantity = $data['quantity'];
    $db = Conectar::conexion();
    $q = "INSERT INTO line (id_order, id_product, quantity) VALUES ($idOrder, $idProduct, $quantity)";
    $db->query($q);
  }

  public static function getLines($idOrder)
  {
    $db = Conectar::conexion();
    $q = "SELECT * FROM line WHERE id_order = '$idOrder'";
    $result = $db->query($q);
    $lines = [];
    while ($data = $result->fetch_assoc()) {
      $lines[] = new Line($data);
    }
    return $lines;
  }
}
