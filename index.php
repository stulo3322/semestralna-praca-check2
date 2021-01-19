<?php
session_start();

$_SESSION['loggedin'];
if($_SESSION['loggedin'] != true) {
    $_SESSION['loggedin'] = false;
}

?>
<!DOCTYPE html>
<html>
<?php
echo file_get_contents("adminHeader.php")
?>
    <body class="body">
    <header>
        <div class="kontajner">
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
        <div class="druhy-navbar">
            <div class="kontajner">
                <nav>
                    <ul>
                        <li><a href="memes.php">Meme Dna</a></li>
                        <li><a href="vtipy.php">Vtipy</a></li>
                        <li><a href="vaseMemes.php">Vase Memes</a></li>
                    </ul>
                </nav>
            </div>
        </div>
        <section id="ukazka">
            <div class="kontajner">
                <h1>Najlepsi portal na zabavu</h1>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur non purus scelerisque, egestas nibh in, finibus lorem. Nulla tincidunt quam vel massa bibendum, nec iaculis diam bibendum.</p>
            </div>
        </section>
        <section id="kategorie">
            <div class="kontajner">
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
            <div class="kontajner">
                <form action="novinkyPrihlasenie.php" method="post">
                    <label>Prihlaste sa na odber tych najlepsich memes kazdy tyzden</label>
                    <input type="email" name="email" placeholder="Zadajte email..." required>
                    <button type="submit" class="tlacidlo">Prihlasit</button>
                </form>
            </div>
        </section>
        <footer>
            <p>Martin Stulrajter, Copyright &copy; 2021</p>
        </footer>
    </body>
</html>