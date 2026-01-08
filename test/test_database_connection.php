<?php
require_once "../src/Core/Database.php";
$pdo = Database::getConnection();
echo "Connecté à la base de données !<br>";


$result = $pdo->query("SELECT 'Hello' as test");
$data = $result->fetch();
echo $data['test'];