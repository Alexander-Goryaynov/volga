<?php

use Backend\Converters\ProductConverter;

require __DIR__ . '/../vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../');
$dotenv->load();

$redis = new Redis();
$redis->connect($_ENV['REDIS_HOST'], $_ENV['REDIS_PORT']);
$redis->auth($_ENV['REDIS_PASSWORD']);

$urlPathParts = explode('/', $_SERVER['PATH_INFO']);
$productId = end($urlPathParts);
$productDictionary = $redis->hGetAll($productId);
echo json_encode(
    ProductConverter::convertToJson($productId, $productDictionary),
    JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES
);