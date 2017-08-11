<?php
$host_name = 'db610909100.db.1and1.com';
$database = 'db610909100';
$user_name = 'dbo610909100';
$password = 'Heidi2108';

$pdo = new PDO("mysql:dbname=$database;host=$host_name", $user_name, $password);

if (!$pdo) {
    die('<p>Verbindung zum MySQL Server fehlgeschlagen: </p>');
} else {
    echo '<meta http-equiv="refresh" content="0; URL=dashboard.html">';     
}
?>