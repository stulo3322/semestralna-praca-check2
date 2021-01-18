<?php


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


    public function vymazanieUctu($login,$heslo,$hesloZnova) : int {
        $hesloDb = $this->db->prepare('SELECT heslo FROM prudaje WHERE login=?');
        $hesloDb->execute([$login]);
        if( $hesloV = $hesloDb->fetch()) {
            if($hesloV['heslo'] == $heslo) {
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
}