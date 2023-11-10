<?php
require_once("order.php");
require_once("orderRepo.php");
class User
{
    private $id, $username, $rol;
    private $carrito; // Order con status 0
    public function __construct($datos)
    {
        $this->id = $datos['id'];
        $this->username = $datos['username'];
        $this->rol = $datos['rol'];
        $this->carrito = OrderRepo::currentOrder($this->id);
    }
    public function getUsername()
    {
        return $this->username;
    }
    public function getRol()
    {
        return $this->rol;
    }

    public function getCarrito()
    {
        return $this->carrito;
    }
    public function addToCarrito($line) // This gets called with the POST
    {
        $this->carrito->addLine($line);
    }
}
