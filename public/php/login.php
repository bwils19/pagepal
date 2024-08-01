<?php
header('Content-Type: application/json');
require 'supabaseClient.php';

$data = json_decode(file_get_contents('php://input'), true);
$email = $data['username'];
$password = $data['password'];

$user = supabase_fetch_user_by_email($email);

if ($user && password_verify($password, $user['password'])) {
    echo json_encode(["status" => "success"]);
} else {
    echo json_encode(["status" => "error", "message" => "Invalid credentials"]);
}
?>
