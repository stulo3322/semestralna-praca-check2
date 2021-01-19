<!DOCTYPE html>
<html>
<?php
echo file_get_contents("header.php")
?>
<body class="body">
<header>
    <div class="kontajner">
        <div id="nadpis">
            <h1><span class="zvyraznenie">Vitaj</span>Admin!</h1>
        </div>
        <nav>
            <ul>
                <li><a href="spravaUctov.php">Sprava uctov</a></li>
                <li><a href="spravaNoviniek.php">Sprava noviniek</a></li>
                <li><a href='logout.php'>Odhlasit</a></li>
            </ul>
        </nav>
    </div>
</header>

<footer>
    <p>Martin Stulrajter, Copyright &copy; 2021</p>
</footer>
</body>
</html>
