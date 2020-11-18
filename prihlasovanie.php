<?php
include_once 'databaza.php';

class prihlasovanie
{
    private $db;
    private $login;
    private $heslo;

    public function __construct()
    {
        $this->db = new databaza();
    }


    public function prihlasenie($login, $heslo): bool {
        return $this->db->kontrolaPrihlasenie($login,$heslo);
    }



}