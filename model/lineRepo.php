<?php
class LineRepo
{
  public static function addLine($idOrder, $idProduct)
  {
    $db = Conectar::conexion();
    $q = "INSERT INTO line (id_order, id_product) VALUES ($idOrder, $idProduct)";
    $db->query($q);
  }

  public static function getLines($idOrder)
  {
    $db = Conectar::conexion();
    $q = "SELECT * FROM line WHERE id_order = $idOrder";
    $result = $db->query($q);
    $lines = [];
    while ($data = $result->fetch_assoc()) {
      $lines[] = new Line($data);
    }
    return $lines;
  }
}
