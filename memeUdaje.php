<?php
include_once "databaza.php";

class memeUdaje
{
    private $login;
    private $nadpis;
    private $popis;
    private $url;

    public function __construct($login, $nadpis, $popis, $url)
    {
        $this->login = $login;
        $this->nadpis = $nadpis;
        $this->popis = $popis;
        $this->url = $url;
    }

    public function getLogin() {
        return $this->login;
    }

    public function getNadpis() {
        return $this->nadpis;
    }

    public function getPopis() {
        return $this->popis;
    }

    public function getUrl() {
        return $this->url;
    }
}