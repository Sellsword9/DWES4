<?php
require_once("db.php");
require_once("model/userRepo.php");
require_once("model/user.php");
require_once("model/optionUser.php");
require_once("model/product.php");
session_start();
if (isset($_GET['accessCarrito'])) {
    $user = $_SESSION['user'];
    require_once("controller/apiController.php");
    die();
}
if (isset($_GET['logout'])) {
    session_destroy();
    header("Location: index.php");
    die();
}
if (isset($_GET['register'])) {
    require_once("view/register.phtml");
    die();
}
if (isset($_POST['id_product'])) {
    $post = $_POST;
    require_once("controller/compraController.php");
}
if (isset($_GET['carrito'])) {
    require_once("controller/carritoController.php");
    die();
}
if (isset($_POST['username']) && isset($_POST['password'])) {
    UserRepository::register($_POST);
}
if (isset($_POST['logusername']) && isset($_POST['logpassword'])) {
    // echo "trying to login";
    $userPromise = UserRepository::checkLogin($_POST);
    if ($userPromise()) {
        $_SESSION['user'] = $userPromise->get();
        header("Location: index.php");
        die();
    } else {
        echo "Usuario o contraseña incorrectos";
    }
}
if (isset($_SESSION['user'])) {
    // echo "hola";
    $db = Conectar::Conexion();
    $productosRecomendos = [];
    $q = "SELECT * FROM product LIMIT 0, 4";
    $result = $db->query($q);
    while ($row = $result->fetch_assoc()) {
        $productosRecomendados[] = new Product($row);
    }
    require_once("view/mainView.phtml");
    die();
} else {
    require_once("view/login.phtml");
    die();
}
