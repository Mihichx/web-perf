<?php 

include __DIR__ . '/cache.php';

$key = 'hello';
$data = 'Привет';
$result = cache_get($key, 10);

if ($result !== null) {
    echo $result . '<br>';
    echo "Из кеша";
} else {
    echo "Без кеша";
    usleep(3000);
    cache_set($key, $data);
}
