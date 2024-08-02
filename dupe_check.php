<?php
// this script exists because if the user is trying to add a book that is already in their library, it
// will alert them. checks just title and author combos. i think that's good enough

$servername = "localhost";
$dbname = "dbfsgepjggiqqn";
$username = " ";
$password = " ";


$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'];
    $author = $_POST['author'];

    $stmt = $conn->prepare("SELECT * FROM books WHERE title = ? AND author = ?");
    $stmt->bind_param("ss", $title, $author);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        echo json_encode(["exists" => true]);
    } else {
        echo json_encode(["exists" => false]);
    }

    $stmt->close();
}

$conn->close();
?>