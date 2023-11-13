<?php
require_once("model/product.php");
require_once("db.php");
class productRepo
{
  public static function getProducts()
  {
    $db = Conectar::conexion();
    $result = $db->query("SELECT * FROM products");
    $results = [];
    while ($row = $result->fetch_assoc()) {
      $results[] = new Product($row);
    }
    return $results;
  }
  public static function getProductById($id)
  {
    $db = Conectar::conexion();
    $result = $db->query("SELECT * FROM products WHERE id = $id");
    $row = $result->fetch_assoc();
    return new Product($row);
  }
}
