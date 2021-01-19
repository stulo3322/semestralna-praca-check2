<?php
include_once "memeUdaje.php";

class databaza
{
    private const DB_HOST = 'localhost';
    private const DB_NAME = 'prUdaje';
    private const DB_USER = 'root';
    private const DB_PASS = 'dtb456';

    private $db;
    private $hash;

    public function __construct()
    {
        try {
            $this->db = new PDO('mysql:dbname=' .self::DB_NAME.';host='. self::DB_HOST, self::DB_USER,self::DB_PASS);
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }

    public function kontrolaPrihlasenie($login,$heslo) : bool {
        $dbRiadky = $this->db->query('select * from prudaje');
        foreach ($dbRiadky as $riadok) {
            if ($riadok['login'] == $login && password_verify($heslo,$riadok['heslo'])) {
                return true;
            }
        }
        return false;
    }

    public function nieRovnakyEmail($email) : bool {
        $dbRiadky = $this->db->query('select email, login from prudaje');
        foreach ($dbRiadky as $riadok) {
            if ($riadok['email'] == $email) {
                return false;
            }
        }
        return true;
    }

    public function nieRovnakyEmailNovinky($email) : bool {
        $dbRiadky = $this->db->query('select email, login from novinky');
        foreach ($dbRiadky as $riadok) {
            if ($riadok['email'] == $email) {
                return false;
            }
        }
        return true;
    }

    public function nieRovnakyLogin($login) : bool {
        $dbRiadky = $this->db->query('select email, login from prudaje');
        foreach ($dbRiadky as $riadok) {
            if ($riadok['login'] == $login) {
                return false;
            }
        }
        return true;
    }

    public function ulozUdajeDb($email,$login,$heslo) {
        $hashslo = password_hash($heslo,PASSWORD_BCRYPT);
        try {
            $sql = 'INSERT INTO prudaje(email,login,heslo) VALUES (?,?,?)';
            $this->db->prepare($sql)->execute([$email,$login,$hashslo]);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function zmenaHesla($login,$stareHeslo,$noveHeslo, $noveHesloZnova) : int
    {
        $dbRiadky = $this->db->query('select * from prudaje');
        foreach ($dbRiadky as $riadok) {
            if ($riadok['login'] == $login && password_verify($stareHeslo, $riadok['heslo'])) {
                if ($noveHeslo == $noveHesloZnova) {
                    try {
                        $noveHashslo = password_hash($noveHeslo, PASSWORD_BCRYPT);

                        $sql = "UPDATE prudaje SET heslo=? WHERE login=?";
                        $this->db->prepare($sql)->execute([$noveHashslo, $login]);
                        return 0;

                    } catch (PDOException $e) {
                        echo 'Failed: ' . $e->getMessage();
                        return 3;
                    }
                } else {
                    return 2;
                }
            }
            return 1;
        }
    }


    public function vymazanieUctu($login,$heslo,$hesloZnova) : int
    {
        $hesloDb = $this->db->prepare('SELECT heslo FROM prudaje WHERE login=?');
        $hesloDb->execute([$login]);
        if ($hesloV = $hesloDb->fetch()) {
            if (password_verify($heslo, $hesloV['heslo'])) {
                if ($heslo == $hesloZnova) {
                    try {
                        $sql = "DELETE FROM prudaje WHERE login=?";
                        $this->db->prepare($sql)->execute([$login]);
                        return 0;
                    } catch (PDOException $e) {
                        echo 'Failed: ' . $e->getMessage();
                        return 3;
                    }
                } else {
                    return 2;
                }
            }
            return 1;
        } else {
            return 1;
        }
    }

    public function prihlasNovinky($email) : bool
    {
        if($this->nieRovnakyEmailNovinky($email)) {
            try {
                $sql = 'INSERT INTO novinky(email) VALUES (?)';
                $this->db->prepare($sql)->execute([$email]);
                return true;
            } catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }
        }
        return false;

    }

    public function vyberUdajeNoviniek()
    {
        $emaily = [];
        $emailyDb = $this->db->query('SELECT * FROM novinky');

        foreach ($emailyDb as $email) {
            $emaily[] = $email['email'];
        }
        return $emaily;
    }

    public function odhlasNovinky($email) {
        try {
            $sql = "DELETE FROM novinky WHERE email=?";
            $this->db->prepare($sql)->execute([$email]);
            return true;
        } catch (PDOException $e) {
            echo 'Failed: ' . $e->getMessage();
            return false;
        }
    }

    public function vlozMeme($login,$nadpis,$popis,$url)
    {
        try {
            $sql = 'INSERT INTO memesky(login,nadpis,popis,url) VALUES (?,?,?,?)';
            $this->db->prepare($sql)->execute([$login,$nadpis,$popis,$url]);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function vyberUdajeOMeme()
    {
        $memes = [];
        $memesDb = $this->db->query('SELECT * FROM memesky');

        foreach ($memesDb as $meme) {
            $memes[] = new memeUdaje($meme['login'],$meme['nadpis'],$meme['popis'],$meme['url']);
        }
        return $memes;
    }
}