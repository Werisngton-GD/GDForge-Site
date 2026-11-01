<?php
declare(strict_types=1);
$path = parse_url($_SERVER['REQUEST_URI'] ?? '/', PHP_URL_PATH);
$public = realpath(__DIR__ . '/public');
$file = is_string($path) ? realpath(__DIR__ . '/public' . $path) : false;
if (is_string($file) && is_string($public) && str_starts_with($file, $public . DIRECTORY_SEPARATOR) && is_file($file)) {
    return false;
}
require __DIR__ . '/public/index.php';
