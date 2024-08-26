<?php
// Database connection details
$dsn = 'pgsql:host=your_host;dbname=your_dbname';
$username = 'your_username';
$password = 'your_password';

try {
    // Establish a connection to the database
    $pdo = new PDO($dsn, $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Prepare the SELECT query
    $sql = 'SELECT * FROM interns';
    $stmt = $pdo->prepare($sql);

    // Execute the query
    $stmt->execute();

    // Fetch all results
    $interns = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Display the results
    foreach ($interns as $intern) {
        echo 'ID: ' . $intern['id'] . '<br>';
        echo 'First Name: ' . $intern['first_name'] . '<br>';
        echo 'Last Name: ' . $intern['last_name'] . '<br>';
        echo 'Date of Birth: ' . $intern['date_of_birth'] . '<br>';
        echo 'Email: ' . $intern['email'] . '<br>';
        echo 'Phone Number: ' . $intern['phone_number'] . '<br>';
        echo 'Graduation Year: ' . $intern['graduation_year'] . '<br>';
        echo 'Experience: ' . $intern['experience'] . '<br>';
        echo 'Request Status: ' . $intern['request_status'] . '<br>';
        echo 'Submitted At: ' . $intern['submitted_at'] . '<br><br>';
    }
} catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
}
?>