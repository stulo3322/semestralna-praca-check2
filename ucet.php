<?php
session_start();
if($_SESSION['loggedin']) {
    header("Location: zmenyUctu.php");
}
include_once "registracia.php";
$reg = new registracia();
if(isset($_POST['odoslane'])) {
    $tmp = $reg->ulozUdaje($_POST['email'],$_POST['login'],$_POST['psw'],$_POST['psw-repeat']);
    if($tmp == 0) {
        header("Location: registered.php");
    } elseif($tmp == 1) {
        echo '<script>alert("Zadane hesla sa nezhoduju!")</script>';
    } elseif($tmp == 2) {
        echo '<script>alert("Email ktory ste zadali je uz pouzity!")</script>';
    } elseif($tmp == 3) {
        echo '<script>alert("Login ktory ste zadali je uz pouzity!")</script>';
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


        <section id="hlavne">
            <div class="container">
                <article id="hlavne-stlpec">
                    <h1 class = "nadpis-stranka">Ucet</h1>

                </article>
                <form method="post">
                    <div class="container">
                        <h1>Registracia</h1>
                        <p>Prosim vyplnte nasledovne udaje pre vytvorenie uctu</p>
                        <hr>
                        <div class="kategoria">
                            <label for="email"><b>E-mail</b></label>
                            <input type="email" placeholder="Enter Email" name="email" id="email" required>
                        </div>
                        <div class="kategoria">
                            <label for="email"><b>Login</b></label>
                            <input type="text" placeholder="Enter Login" name="login" id="login" required>
                        </div>
                        <div class="kategoria">
                            <label for="psw"><b>Heslo</b></label>
                            <input type="password" placeholder="Enter Password" name="psw" id="psw" required>
                        </div>
                        <div class="kategoria">
                            <label for="psw-repeat"><b>Zopakujte heslo</b></label>
                            <input type="password" placeholder="Repeat Password" name="psw-repeat" id="psw-repeat" required>
                        </div>
                    <hr>
                
                    <p>Vytvorenim uctu suhlasite s nasimi <a href="#">Komunitnymi podmienkami MemeHell</a>.</p>
                    <button type="submit" name="odoslane" class="registerbtn">Zaregistrovat</button>
                    </div>
                
                    <div class="container signin">
                    <p>Uz mate ucet? <a href="prihlasenie.php">Prihlaste sa</a>.</p>
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