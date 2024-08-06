<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST, GET, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type, Authorization');
header('Content-Type: application/json');
require 'supabaseClient.php';

$data = json_decode(file_get_contents('php://input'), true);

// Check if the required data is present
if (!isset($data['username']) || !isset($data['password'])) {
    echo json_encode(["status" => "error", "message" => "Username or password is missing"]);
    exit;
}

$email = $data['username'];
$password = $data['password'];

$user = supabase_fetch_user_by_email($email);

if ($user && password_verify($password, $user['password'])) {
    echo json_encode(["status" => "success"]);
} else {
    echo json_encode(["status" => "error", "message" => "Invalid credentials"]);
}
?>
