<?php
include_once 'databaza.php';

class registracia
{
    private $db;
    public function __construct()
    {
        $this->db = new databaza();
    }

    private function kontrolaHesla($heslo,$heslo2):bool
    {
        if($heslo == $heslo2) {
            return true;
        } else {
            return false;
        }
    }

    public function ulozUdaje($email,$login,$heslo,$heslo2) : int
    {
        if (!$this->kontrolaHesla($heslo,$heslo2)) {
            return 1;
        } elseif (!$this->db->nieRovnakyEmail($email)) {
            return 2;
        } elseif (!$this->db->nieRovnakyLogin($login)) {
            return 3;
        } else {
            $this->db->ulozUdajeDb($email, $login, $heslo);
            return 0;
        }
    }
}