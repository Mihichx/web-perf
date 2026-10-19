<?php

$cssFile = __DIR__ . '/style.css';

if (!file_exists($cssFile)) {
    header('HTTP/1.1 404 Not Found');
    echo "CSS file not found.";
    exit;
}

$lastModifiedTime = filemtime($cssFile);
$etag = md5_file($cssFile);              

$lastModifiedHttp = gmdate("D, d M Y H:i:s", $lastModifiedTime) . " GMT";

$clientEtag = isset($_SERVER['HTTP_IF_NONE_MATCH']) ? trim($_SERVER['HTTP_IF_NONE_MATCH']) : '';
$clientLastModified = isset($_SERVER['HTTP_IF_MODIFIED_SINCE']) ? trim($_SERVER['HTTP_IF_MODIFIED_SINCE']) : '';

if ($clientEtag === '"' . $etag . '"' || $clientLastModified === $lastModifiedHttp) {
    header("HTTP/1.1 304 Not Modified");
    exit;
}

header("Content-Type: text/css; charset=UTF-8");
header("Cache-Control: max-age=3600, public");
header("Last-Modified: " . $lastModifiedHttp);
header("ETag: \"" . $etag . "\"");

readfile($cssFile);
