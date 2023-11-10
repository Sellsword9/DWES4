<?php
  require_once("order.php");
  require_once("db.php");
  class OrderRepo{

    public static function createCarrito($idUser): Order
    {
      $db = Conectar::conexion();
      $q = "INSERT INTO orders (user_id, status) VALUES ($idUser, 0)";
      $db->query($q);
      return OrderRepo::currentOrder($idUser);
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
      $q = "SELECT * FROM order WHERE user_id = $idUser AND status = 0";
      $result = $db->query($q);
      $data = $result->fetch_assoc();
      return  new Order($data);
    }
  }
?>