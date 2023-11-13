<?php
require_once("order.php");
require_once("db.php");
class OrderRepo
{

  public static function createCarrito($idUser): void
  {
    $db = Conectar::conexion();
    $q = "INSERT INTO orders (id_user, status) VALUES ($idUser, 0)";
    $db->query($q);
  }

  public static function currentLines($idUser): Order
  {
    $db = Conectar::conexion();
    $orderId = OrderRepo::currentOrder($idUser);
    $q = "SELECT count(*) FROM line WHERE id_order = $orderId ";
    $result = $db->query($q);
    $data = $result->fetch_assoc();
    return new Order($data);
  }
  public static function currentOrder($idUser): Order
  {
    $db = Conectar::conexion();
    $q = "SELECT * FROM orders WHERE (id_user = '$idUser' AND status = 0)";
    var_dump($q);
    $result = $db->query($q);
    $data = $result->fetch_assoc();
    return new Order($data);
  }
}
