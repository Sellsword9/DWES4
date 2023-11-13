<?php
require_once("model/productRepo.php");
require_once("model/line.php");
require_once("model/lineRepo.php");
if (isset($_POST['id_product'])) {
  // $idProduct = $_POST['id_product'];
  // $quantity = $_POST['quantity'];
  $user = $_SESSION['user'];
  $user->getCarrito()->addLine($post);
  header("Location: index.php");
  die();
}
