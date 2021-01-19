<?php
session_start();

$_SESSION['loggedin'];
if($_SESSION['loggedin'] != true) {
    $_SESSION['loggedin'] = false;
}

?>
<!DOCTYPE html>
<html lang="en">
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
<div class="container">

    <div class="vtipy">
    </div>
    <div class="text-center my-4 text-success">
        <div class="load spinner-border mb-4">
        </div>
    </div>
</div>
<div class="sipka-hore my-4 mx-4">
    <img src="obrazky/sipka.png" width="30px" height="40px" onclick="topFunction()">
</div>
<script>
    function topFunction() {
        window.scrollTo({top: 0, behavior: 'smooth'});
    }
</script>
<script src="js/vtipy.js"></script>
</body>
</html>