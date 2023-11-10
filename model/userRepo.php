<?php
require_once("db.php");
class UserRepository{
    public static function checkLogin($data)
    {
        return OptionUser::check($data);
    }

    public static function getUserById($id)
    {
        $bd=Conectar::conexion();
        $q="SELECT * FROM users WHERE id='".$id."'";
        $result=$bd->query($q);
        if($datos=$result->fetch_assoc()){
            return new User($datos);
        }
    }

    public static function register($datos)
    {
        // var_dump("executed");
        $db=Conectar::conexion();
        $username=$datos['username'];
        $password=$datos['password'];
        $realPassword = password_hash($password, PASSWORD_DEFAULT);
        $q="INSERT INTO user (username, password) VALUES ('".$username."', '".$realPassword."')";
        $db->query($q);
    }
}
