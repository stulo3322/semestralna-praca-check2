<?php
include_once "databaza.php";
$db = new databaza();
session_start();

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

                <?php

                if($_SESSION['loggedin'] == false) {

                } else {
                    echo "<li><a href='nahratMeme.php'>Nahrat meme</a></li>";
                }
                ?>

            </ul>
        </nav>
    </div>
</div>

<div class="row row-cols-1 row-cols-md-4 pl-4 pr-5 pt-4">
<?php
    $memes = $db->vyberUdajeOMeme();
    /** @var memeUdaje  $meme*/

    foreach ($memes as $meme) {
        echo '
            
                <div class="col mb-4">
                             <div class="card">
                                <img src='.$meme->getUrl().' class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">'.$meme->getNadpis().'</h5>
                                    <p class="card-text">'.$meme->getPopis().'</p>
                                </div>
                                <div class="card-footer">
                                    <small class="text-muted">Pridal pouzivatel: '.$meme->getLogin().'</small>
                                </div>
                            </div>
                </div>
        ';
    }
?>
</div>

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