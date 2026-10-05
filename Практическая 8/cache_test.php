<?php

$start = microtime(true);

$key = 'numbers';

$cacheFile = __DIR__ . '/cache/' . $key . '.json';

if (file_exists($cacheFile) && time() - filemtime($cacheFile) < 10) {

    $data = json_decode(file_get_contents($cacheFile), true);

    echo "Данные из кэша: ";

} else {

    // "Дорогая" операция

    sleep(2); // имитация долгой работы

    $data = range(1, 1000);

    file_put_contents($cacheFile, json_encode($data));

    echo "Данные сгенерированы: ";

}



print_r(array_slice($data, 0, 5));

echo "Время выполнения: " . (microtime(true) - $start);
