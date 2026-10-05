<?php

$start = microtime(true);

for ($i = 0; $i < 500000; $i++) {
    $x = sqrt($i);
}

echo "Время выполнения: " . (microtime(true) - $start);
