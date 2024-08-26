<?php
$host = 'localhost';
$db = 'your_database';
$user = 'your_username';
$pass = 'your_password';
$charset = 'utf8mb4';

$dsn = "pgsql:host=$host;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

try {
    $pdo = new PDO($dsn, $user, $pass, $options);
} catch (\PDOException $e) {
    throw new \PDOException($e->getMessage(), (int)$e->getCode());
}

$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$date_of_birth = $_POST['date_of_birth'];
$email = $_POST['email'];
$phone_number = $_POST['phone_number'];
$graduation_year = $_POST['graduation_year'];
$experience = $_POST['experience'];

$sql = "INSERT INTO interns (first_name, last_name, date_of_birth, email, phone_number, graduation_year, experience) 
        VALUES (?, ?, ?, ?, ?, ?, ?)";
$stmt= $pdo->prepare($sql);
$stmt->execute([$first_name, $last_name, $date_of_birth, $email, $phone_number, $graduation_year, $experience]);

echo "Stagiaire ajouté avec succès!";
?>