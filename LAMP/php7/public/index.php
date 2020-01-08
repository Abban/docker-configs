<?php include_once '../vendor/autoload.php';

use Dotenv\Dotenv;

$dotenv = Dotenv::createImmutable(__DIR__ . '/../');
$dotenv->load();

$driver   = getenv('DB_DRIVER');
$host     = getenv('DB_SERVER');
$database = getenv('DB_DATABASE');
$username = getenv('DB_USERNAME');
$password = getenv('DB_PASSWORD');

$db = new PDO("{$driver}:host={$host};dbname={$database}", $username, $password);

$statement = $db->query('SELECT * from users');

echo 'Hello World';

echo '<pre>';

while($row = $statement->fetch()) {
    print_r($row);
}

echo '</pre>';