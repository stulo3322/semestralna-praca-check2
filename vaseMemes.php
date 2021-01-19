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

<div class="container">
        <form>
            <div class="form-group my-3">
                <label for="nadpis"><h3>Nadpis</h3></label>
                <input type="text" class="form-control" id="nadpis"  placeholder="Nadpis" required>
                </div>
            <div class="form-group">
                <label for="popis"><h3>Popis</h3></label>
                <input type="text" class="form-control" id="text" placeholder="Popis" required>
            </div>
            <div class="form-group">
                <label><h3>Vlozte obrazok</h3></label>
                <input type="file" class="form-control-file" id="obrazok" required>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-success">Odoslat</button>
            </div>
        </form>
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