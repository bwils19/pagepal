<?php
header('Content-Type: application/json');
error_reporting(E_ALL);
ini_set('display_errors', 1);
require 'supabaseClient.php';

// Get POST data
$data = json_decode(file_get_contents('php://input'), true);

if (isset($data['name']) && isset($data['username']) && isset($data['password']) && isset($data['email'])) {
  $name = $data['name'];
  $username = $data['username'];
  $password = $data['password'];
  $email = $data['email'];

// Hash the password
  $hashed_password = password_hash($password, PASSWORD_DEFAULT);

// Insert user into the Supabase database
  $result = supabase_insert_user($name, $username, $hashed_password, $email);

  if ($result['status'] === 'success') {
    echo json_encode(["status" => "success"]);
  } else {
    echo json_encode(["status" => "error", "message" => $result['message']]);
  }
} else {
  echo json_encode(["status" => "error", "message" => "Missing required fields. "]);
}
?>
