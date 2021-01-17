<?php
include_once "databaza.php";
$db = new databaza();
session_start();

if(isset($_POST['zmena'])) {
    $tmp = $db->zmenaHesla($_SESSION['login'],$_POST['sPsw'],$_POST['nPsw'],$_POST['nPsw-repeat']);
    if($tmp == 0) {
        echo '<script>alert("Heslo uspesne zmenene!")</script>';
        header("Location: zmenyUctu.php");
    } elseif($tmp == 1) {
        echo '<script>alert("Zle zadane stare heslo!")</script>';
    } elseif($tmp == 2) {
        echo '<script>alert("Nove hesla sa nezhoduju!")</script>';
    } elseif($tmp == 3) {
        echo '<script>alert("Databaza!")</script>';
    }
}

if(isset($_POST['vymazanie'])) {
    $tmp = $db->vymazanieUctu($_SESSION['login'],$_POST['psw'],$_POST['psw-repeat']);
    if($tmp == 0) {
        $_SESSION['loggedin'] = false;
        $_SESSION['login'] = "";
        echo '<script>alert("Heslo uspesne zmenene!")</script>';
        header("Location: index.php");
    } elseif($tmp == 1) {
        echo '<script>alert("Zadali ste nespravne heslo!")</script>';
    } elseif($tmp == 2) {
        echo '<script>alert("Hesla sa nezhoduju!")</script>';
    } elseif($tmp == 3) {
        echo '<script>alert("Databaza!")</script>';
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Stranka, ktora je akoze vtipna">
    <meta name="keywords" content="meme,zabava,obrazky,vtip">
    <meta name="author" content="Martin Stulrajter">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>MemeHell | Ucet</title>
    <link rel="stylesheet" href="./css/semestralka.css">
</head>
<body class="body">
<header>
    <div class="container">
        <div id="nadpis">
            <h1><span class="zvyraznenie">Meme</span> Hell</h1>
        </div>
        <nav>
            <ul>
                <li><a href="index.php">Domov</a></li>
                <li><a href="oNas.php">O nas</a></li>
                <li class="aktualny"><a href="">Ucet</a></li>
                <?php
                if($_SESSION['loggedin'] == false) {
                    echo "<li><a href='prihlasenie.php'>" . "Prihlasit sa" . "</a></li>";
                } else {
                    echo "<li><a href='logout.php'>" . "Odhlasit" . "</a></li>";
                }
                ?>

            </ul>
        </nav>
    </div>
</header>


<section class="hlavne">
    <div class="container">
        <article id="hlavne-stlpec">
            <h1 class = "nadpis-stranka">Zmeny uctu pouzivatela: <?php echo $_SESSION['login']?></h1>

        </article>
        <form method="post">
            <div class="container">
                <h1>Zmena hesla</h1>
                <br>
                <div class="kategoria">
                    <label for="psw"><b>Stare heslo</b></label>
                    <input type="password" placeholder="Zadajte heslo" name="sPsw" id="psw" required>
                </div>
                <br>
                <div class="kategoria">
                    <label for="psw"><b>Nove Heslo</b></label>
                    <input type="password" placeholder="Zadajte heslo" name="nPsw" id="psw" required>
                </div>
                <div class="kategoria">
                    <label for="psw-repeat"><b>Zopakujte heslo</b></label>
                    <input type="password" placeholder="Zopakujte heslo" name="nPsw-repeat" id="psw-repeat" required>
                </div>
                <br>
                <button type="submit" name="zmena" class="registerbtn">Zmenit heslo</button>
            </div>
        </form>
        <hr>
        <form  method="post">
            <div class="container">
                <h1>Vymazanie uctu</h1>
                <br>
                <div class="kategoria">
                    <label for="psw"><b>Heslo</b></label>
                    <input type="password" placeholder="Zadajte heslo" name="psw" id="psw" required>
                </div>
                <div class="kategoria">
                    <label for="psw-repeat"><b>Zopakujte heslo</b></label>
                    <input type="password" placeholder="Zopakujte heslo" name="psw-repeat" id="psw-repeat" required>
                </div>
                <br>
                <button type="submit" name="vymazanie" class="registerbtn">Odstranit ucet</button>
            </div>
        </form>
    </div>
</section>

<section id="novinky">
    <div class="container">
        <h1>Prihlaste sa na odber noviniek</h1>
        <form action="action.php">
            <input type="email" placeholder="Zadajte email...">
            <button type="submit" class="tlacidlo">Prihlasit</button>
        </form>
    </div>
</section>
<footer>
    <p>Martin Stulrajter, Copyright &copy; 2020</p>
</footer>
</body>
</html>
