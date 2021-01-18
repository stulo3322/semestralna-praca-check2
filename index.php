<?php
session_start();

$_SESSION['loggedin'];
if($_SESSION['loggedin'] != true) {
    $_SESSION['loggedin'] = false;
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
        <base href="/semestralna-praca-check2/">
        <title>MemeHell | Vitajte</title>
        <link rel="stylesheet" href="css/semestralka.css">
    </head>
    <body class="body">
        <header>
            <div class="container">
                <div id="nadpis">
                    <h1><span class="zvyraznenie">Meme</span> Hell</h1>
                </div>
                <nav>
                    <ul>
                        <li class="aktualny"><a href="">Domov</a></li>
                        <li><a href="oNas.php">O nas</a></li>
                        <li><a href="ucet.php">Ucet</a></li>
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
        <div class="nav2">
            <nav>
                <ul>
                    <li class="aktualny"><a href="">Domov</a></li>
                    <li><a href="oNas.php">O nas</a></li>
                    <li><a href="ucet.php">Ucet</a></li>
                </ul>
            </nav>
        </div>

        <section id="ukazka">
            <div class="container">
                <h1>Najlepsi portal na zabavu</h1>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur non purus scelerisque, egestas nibh in, finibus lorem. Nulla tincidunt quam vel massa bibendum, nec iaculis diam bibendum.</p>
            </div>
        </section>
        <section id="kategorie">
            <div class="container">
                <div class="kategoria">
                    <img src="./obrazky/fire-8159-128x128.ico" alt="fire">
                    <h3>HOT</h3>
                    <p>Najlepsie obrazky za tento tyzden</p>
                </div>
                <div class="kategoria">
                    <img src="./obrazky/arrow-9201-128x128.ico" alt="arrow">
                    <h3>TRENDING</h3>
                    <p>Najlepsie dnesne obrazky</p>
                </div>
                <div class="kategoria">
                    <img src="./obrazky/baby-14213-128x128.ico" alt="baby">
                    <h3>FRESH</h3>
                    <p>Najnovsie obrazky</p>
                </div>
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