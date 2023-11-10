<?php
    require_once("user.php");
    require_once("userRepo.php");
    class OptionUser
    {
       private $User = null;
       private $Good = false;
       public function __construct($g, $user = null) 
       {
        $this->Good = $g;
        $this->User = $user;
       }      
       public static function check($data): OptionUser
       {
            $bd=Conectar::conexion();
            $u=$data['logusername'];
            $p=$data['logpassword'];
            $q="SELECT * FROM user WHERE username = '$u'";
            $result=$bd->query($q);
            if($fila=$result->fetch_assoc()){
                if(password_verify($p, $fila['PASSWORD'])){
                    // echo "if";
                    return new OptionUser(true, new User($fila));
                }
                else{
                    // echo "else 1";
                    return new OptionUser(false);
                }
            }else{
                // echo "else 2";
                return new OptionUser(false);
            }
       }
       public function __invoke()
       {
            return $this->Good;
       }
       public function get()
       {
            return $this->User;
       }
    }
?>