<?php

include 'db.php';



$start = microtime(true);



for ($i = 0; $i < 10; $i++) {

    $email = "user" . $i . "@example.com";

    $stmt = $pdo->query("SELECT * FROM users WHERE email = '$email'");

    $stmt->fetch();

}



echo "Время: " . (microtime(true) - $start);
