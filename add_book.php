<?php
// Database connection details - left over from project 8, but probably won't use this
$servername = "localhost";
$dbname = " ";
$username = " ";
$password = " ";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'];
    $author = $_POST['author'];
    $cover = $_POST['cover']; // need to handle cover image URL properly
    $pages = $_POST['pages'];
    $summary = $_POST['summary'];
    $status = $_POST['status'];

    $stmt = $conn->prepare("INSERT INTO books (title, author, cover, pages, summary, status) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssss", $title, $author, $cover, $pages, $summary, $status);

    if ($stmt->execute()) {
        echo "Book added successfully!";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>
