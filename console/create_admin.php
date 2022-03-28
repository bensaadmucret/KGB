<?php declare(strict_types=1);
require __DIR__ . '/../vendor/autoload.php';

use App\Application;


$db = Application::getContainer()->get('Database')->connect();

($nom = $argv[1]) || die('Please provide a firstname');
($prenom = $argv[2]) || die('Please provide a lastname');
($email = $argv[3]) || die('Please provide a email');
($password = $argv[4]) || die('Please provide a password');



$password_admin = password_hash($password, PASSWORD_DEFAULT);

// requete prepare
$stmt = $db->prepare ("INSERT INTO administrateur (nom, prenom, email, password_admin ) VALUES (:nom, :prenom, :email, :password_admin)");
$stmt -> bindParam(':nom', $nom);
$stmt -> bindParam(':prenom',  $prenom);
$stmt -> bindParam(':email', $email);
$stmt -> bindParam(':password_admin', $password_admin);
$stmt -> execute();

echo 'User created';








