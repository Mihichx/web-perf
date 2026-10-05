<?php

include 'db.php';



$start = microtime(true);



$stmt = $pdo->prepare("SELECT * FROM users WHERE email = :email");



for ($i = 0; $i < 10; $i++) {

    $stmt->execute(['email' => 'user' . $i . '@example.com']);

    $stmt->fetch();

}



echo "Время: " . (microtime(true) - $start);
