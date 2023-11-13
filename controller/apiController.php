<?php
require_once("db.php");
require_once("model/userRepo.php");
require_once("model/user.php");
require_once("model/line.php");
require_once("model/order.php");
if (isset($_SESSION['user'])) {
  $user = $_SESSION['user'];
  // var_dump(prepararCarrito($user->getCarrito()));
  isset($_GET['accessCarrito']) && print(json_encode(prepararCarrito($user->getCarrito())));
  die();
}
function prepararCarrito($c)
{
  $carrito = [];
  $carrito = ["id" => $c->getId()];
  foreach ($c->getLines() as $line) {
    $carrito[] = [
      "id" => $line->getId(),
      "id_product" => $line->getProduct()->getId(),
      "name" => $line->getProduct()->getName(),
      "price" => $line->getProduct()->getPrice(),
      "quantity" => $line->getQuantity()
    ];
  }
  return $carrito;
}
