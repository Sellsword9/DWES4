<?php
  
  if (isset($_GET['carrito']) && isset($_SESSION['user']))
  {
    $carrito = $_SESSION['user']->getCarrito();
    require_once("view/carritoView.phtml");
  }


?>