<?php
$host_name = 'db610909100.db.1and1.com';
$database = 'db610909100';
$user_name = 'dbo610909100';
$password = 'Heidi2108';

$dbh = null;
try {
  $dbh = new PDO("mysql:host=$host_name; dbname=$database;", $user_name, $password);
} catch (PDOException $e) {
  echo "Fehler!: " . $e->getMessage() . "<br/>";
  die();
}
?>