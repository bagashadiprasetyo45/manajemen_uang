<?php
declare(strict_types=1);

function env(string $key, string $default = ''): string {
    $v = getenv($key);
    if ($v !== false && $v !== '') return $v;
    if (isset($_ENV[$key]) && $_ENV[$key] !== '') return (string)$_ENV[$key];
    if (isset($_SERVER[$key]) && $_SERVER[$key] !== '') return (string)$_SERVER[$key];
    return $default;
}

const DB_HOST = 'localhost';
const DB_NAME = 'keuangan_bagas';
const DB_USER = 'root';
const DB_PASS = '12345678';

function db(): PDO
{
    static $pdo = null;
    if ($pdo instanceof PDO) {
        return $pdo;
    }
    // Prioritas: ENV dari hosting (InfinityFree/Railway) > konstanta lokal
    $host = env('DB_HOST', DB_HOST);
    $name = env('DB_NAME', DB_NAME);
    $user = env('DB_USER', DB_USER);
    $pass = env('DB_PASS', DB_PASS);

    $dsn = 'mysql:host=' . $host . ';dbname=' . $name . ';charset=utf8mb4';
    $pdo = new PDO($dsn, $user, $pass, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES => false,
    ]);
    return $pdo;
}
