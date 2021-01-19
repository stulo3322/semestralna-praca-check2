<?php

include_once 'databaza.php';

$db = new databaza();


    $tmp = $db->prihlasNovinky($_POST['email']);
    if ($tmp) {
        header("Location: index.php");
    } else {
        echo '<script>alert("Nespravny email!")</script>';
    }





