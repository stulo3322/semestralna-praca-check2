<?php
session_start();
include_once "prihlasovanie.php";
$pri = new prihlasovanie();
if(isset($_POST['odoslane'])) {
    $tmp = $pri->prihlasenie($_POST['login'], $_POST['heslo']);
    if ($tmp) {
        $_SESSION['loggedin'] = true;
        $_SESSION['login'] = $_POST['login'];
        header("Location: index.php");
    } else {
        echo '<script>alert("Nespravny login alebo heslo!")</script>';
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

            </ul>
        </nav>
    </div>
</header>


<section id="hlavne">
    <div class="container">
        <article id="hlavne-stlpec">
            <h1 class = "nadpis-stranka">Ucet</h1>

        </article>
        <form method="post">
            <div class="container">
                <h1>Prihlasenie</h1>
                <p>Prosim vyplnte nasledovne udaje pre prihlasenie</p>
                <hr>

                <label for="email"><b>Login</b></label>
                <input type="text" placeholder="Enter Login" name="login" id="login" required>

                <label for="psw"><b>Heslo</b></label>
                <input type="password" placeholder="Enter Password" name="heslo" id="psw" required>

                <button type="submit" name="odoslane" class="registerbtn">Prihlasit</button>
            </div>

            <div class="container signin">
                <p>Nemate ucet? <a href="ucet.php">Zaregistrujte sa</a>.</p>
            </div>
        </form>
        <?php

        ?>


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