<?php
require_once("model/productRepo.php");
require_once("model/orderRepo.php");
require_once("model/lineRepo.php");
require_once("model/line.php");

if (isset($_GET['carrito']) && isset($_SESSION['user'])) {
  $carrito = $_SESSION['user']->getCarrito();
  require_once("view/carritoView.phtml");
}
