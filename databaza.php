<?php


class databaza
{
    private const DB_HOST = 'localhost';
    private const DB_NAME = 'prUdaje';
    private const DB_USER = 'root';
    private const DB_PASS = 'dtb456';

    private $db;

    public function __construct()
    {
        try {
            $this->db = new PDO('mysql:dbname=' .self::DB_NAME.';host='. self::DB_HOST, self::DB_USER,self::DB_PASS);
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }

    public function kontrolaPrihlasenie($login,$heslo) {
        $dbRiadky = $this->db->query('select * from prudaje');
        foreach ($dbRiadky as $riadok) {
            if ($riadok['login'] == $login && $riadok['heslo'] == $heslo) {
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
        try {
            $sql = 'INSERT INTO prudaje(email,login,heslo) VALUES (?,?,?)';
            $this->db->prepare($sql)->execute([$email,$login,$heslo]);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function zmenaHesla($login,$stareHeslo,$noveHeslo, $noveHesloZnova) : int {
        $dbRiadky = $this->db->query('select * from prudaje');
        foreach ($dbRiadky as $riadok) {
            if ($riadok['login'] == $login && $riadok['heslo'] == $stareHeslo) {
                if ($noveHeslo == $noveHesloZnova) {
                    try {
                        $sql = "UPDATE prudaje SET heslo=? WHERE login=? AND heslo=?";
                        $this->db->prepare($sql)->execute([$noveHeslo, $login, $stareHeslo]);
                        return 0;

                    } catch (PDOException $e) {
                        echo 'Failed: ' . $e->getMessage();
                        return 3;
                    }
                } else {
                    return 2;
                }
            }
        }
        return 1;
    }

    public function vymazanieUctu($login,$heslo,$hesloZnova) : bool {
        if ($heslo == $hesloZnova) {
            try {
                $sql = "DELETE FROM prudaje WHERE login=?";
                $this->db->prepare($sql)->execute([$login]);
                return true;
            } catch (PDOException $e) {
                echo 'Failed: ' . $e->getMessage();
                return false;
            }
        } else {
            return false;
        }
    }
}