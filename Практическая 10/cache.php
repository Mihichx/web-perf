<?php

function cache_get(string $key, int $ttl) {
    $file = __DIR__ . '/cache/' . md5($key) . '.cache';

    if (file_exists($file)) {
        if ((time() - filemtime($file)) < $ttl){
            return unserialize(file_get_contents($file));
        }
    } 
    
    return null;
}

function cache_set(string $key, mixed $data)
{
    $file = __DIR__ . '/cache/' . md5($key) . '.cache';
    file_put_contents($file, serialize($data)); 
}
