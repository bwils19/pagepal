<?php
// created a new db in phpmyadmin on my account for testing.
$servername = "localhost";
$dbname = "dbqumeqfgcelhk";
$username = " ";
$password = " ";


$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'];
    $author = $_POST['author'];
    $cover = $_POST['cover'];
    $pages = $_POST['pages'];
    $summary = $_POST['summary'];
    $status = $_POST['status'];
    $rating = isset($_POST['rating']) ? $_POST['rating'] : null;

    $stmt = $conn->prepare("INSERT INTO books (title, author, cover, pages, summary, status, rating) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssiiss", $title, $author, $cover, $pages, $summary, $status, $rating);

    if ($stmt->execute()) {
        echo "Book added successfully!";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>
