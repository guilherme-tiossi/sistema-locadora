<?php 
$servidor = 'localhost';
$usuario = 'root';
$senha = '';
$dbname = 'crud';

$pdo = new PDO("mysql:host=$servidor;dbname=$dbname", $usuario, $senha);
?>