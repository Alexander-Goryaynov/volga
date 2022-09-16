<?php

use League\Csv\Reader;

require __DIR__ . '/../vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../');
$dotenv->load();

$redis = new Redis();
$redis->connect($_ENV['REDIS_HOST'], $_ENV['REDIS_PORT']);
$redis->auth($_ENV['REDIS_PASSWORD']);
$redis->flushDB();

$csvFilePath = $argv[1];
$csvReader = Reader::createFromPath($csvFilePath);
$csvReader->setDelimiter(';');
$csvReader->setHeaderOffset(0);
$columnNames = $csvReader->getHeader();

foreach ($csvReader->getRecords() as $line) {
    $id = $line[$columnNames[0]];
    for ($i = 1; $i < count($columnNames); $i++) {
        $redis->hSet($id, $columnNames[$i], $line[$columnNames[$i]]);
    }
}

echo 'Загрузка данных завершена';

