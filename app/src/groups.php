<?php
header('Content-Type: application/json');
require 'supabaseClient.php';

// $data = json_decode(file_get_contents('php://input'), true);
// $email = $data['username'];
// $password = $data['password'];

$users_groups = supabase_get_users_groups();


if ($users_groups) {
    echo json_encode(["status" => "success"]);
} else {
    echo json_encode(["status" => "error", "message" => "Null Returned for groups"]);
}
?>
