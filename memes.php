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
                    <li><a href="index.php">Domov</a></li>
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

    <div class="meme">

    </div>

    <script src="js/memes.js"></script>
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