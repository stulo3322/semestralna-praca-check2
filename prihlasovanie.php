<?php
include_once 'databaza.php';

class prihlasovanie
{
    private $db;

    public function __construct()
    {
        $this->db = new databaza();
    }


    public function prihlasenie($login, $heslo): bool {
        return $this->db->kontrolaPrihlasenie($login,$heslo);
    }



}