<?php declare(strict_types=1);
require __DIR__ . '/../vendor/autoload.php';

use App\Application;
use Core\Database\Connection;

$db = Application::getContainer()->get('Database')->connect();
/*
try {
    $db =   Connection::get()->connect();
} catch (\PDOException $e) {
    echo $e->getMessage();
}*/


($lastname = $argv[1]) || die('Please provide a username');
($firstname = $argv[2]) || die('Please provide a username');
($email = $argv[3]) || die('Please provide a email');
($password = $argv[4]) || die('Please provide a password');
($role = $argv[5]) || die('Please provide a role');
$date = date('Y-m-d H:i:s');
$password = password_hash($password, PASSWORD_DEFAULT);


$sth = $db->prepare("INSERT INTO administrateur (nom, prenom, email, password, role, created_at) VALUES (:lastname, :firstname, :email, :password, :role, :date)");
$sth->execute( [
    'lastname' => $lastname,
    'firstname' => $firstname,
    'email' => $email,
    'password' => $password,
    'role' => $role,
    'date' => $date
]);

echo "Admin created successfully";








