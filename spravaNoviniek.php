<?php
include_once "databaza.php";
$db = new databaza();

if(isset($_POST['odstranenie'])) {
    $db->odhlasNovinky($_POST['email']);
    header("Location: spravaNoviniek.php");
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
            <h1><span class="zvyraznenie">Vitaj</span>Admin!</h1>
        </div>
        <nav>
            <ul>
                <li><a href="admin.php">Domov admin</a></li>
                <li><a href="spravaNoviniek.php">Sprava noviniek</a></li>
                <li><a href='logout.php'>Odhlasit</a></li>
            </ul>
        </nav>
    </div>
</header>
<div class="container">
    <table class="table table-striped">
        <thead>
        <tr>
            <th scope="col">Email</th>
            <th scope="col"></th>
        </tr>
        </thead>
        <tbody>
        <?php
        $emaily = $db->vyberUdajeNoviniek();
        foreach ($emaily as $email) {
            echo '  
                <tr>
                    <td>
                    <p>'. $email .'</p>
                    </td>
                    
                    <td>
                    <form method="post">
                    <input type="hidden" name="email" value='.$email.'>
                    <input class="btn btn-danger" type="submit" name="odstranenie" value="Odstranit">
                    </form>
                    </td>
                </tr>
            
            ';
        }
        ?>

        </tbody>
    </table>
</div>

<footer>
    <p>Martin Stulrajter, Copyright &copy; 2021</p>
</footer>
</body>
</html>
