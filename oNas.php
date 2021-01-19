<?php
session_start();

?>
<!DOCTYPE html>
<html>
<?php
echo file_get_contents("header.php")
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
                        <li class="aktualny"><a href="">O nas</a></li>
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
        <section id="hlavne">
            <div class="kontajner">
                    <h1 class = "nadpis-stranka">O nas</h1>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla efficitur vel nulla ultricies ultricies. Sed gravida tincidunt quam porta pellentesque. Sed malesuada maximus bibendum. Morbi et sagittis mi, vitae ullamcorper ex. Integer quis lorem posuere, vulputate turpis ut, malesuada metus. Fusce a enim accumsan odio efficitur pellentesque sit amet vel neque. Quisque imperdiet magna et condimentum facilisis. Praesent semper, eros ac aliquet eleifend, ipsum risus ornare risus, id laoreet augue neque eget felis. Mauris faucibus auctor fringilla. Donec eu mollis massa. Aenean convallis facilisis orci eget convallis. Morbi a pretium felis. Proin a nunc eleifend, convallis enim eu, gravida mi.</p> 

                    <p>Etiam egestas dui non nibh pulvinar bibendum. Quisque at felis id augue aliquam euismod. In pulvinar viverra turpis id maximus. Donec pharetra pellentesque auctor. Sed pellentesque arcu quis elit porta rutrum. Aliquam erat volutpat. Aenean at fringilla neque. Aliquam sed metus eros. Sed vel efficitur leo. Sed dapibus sapien sed turpis finibus, at pellentesque sapien venenatis. Aliquam ac leo convallis, blandit dolor vel, vulputate enim. Donec varius velit mauris. Sed feugiat, libero vitae luctus condimentum, mi urna placerat massa, a finibus libero enim ut nunc.</p>
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