<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST, GET, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type, Authorization');
require(__DIR__.'/../vendor/autoload.php');
// require '../../vendor/autoload.php';

use GuzzleHttp\Client;

function supabase_insert_user($name, $username, $hashed_password, $email) {
  $supabaseUrl = 'https://ojygetcgjabzpxbmdaax.supabase.co';
  $supabaseKey = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpc3MiOiJzdXBhYmFzZSIsInJlZiI6Im9qeWdldGNnamFienB4Ym1kYWF4Iiwicm9sZSI6ImFub24iLCJpYXQiOjE3MjEzNDUyNzEsImV4cCI6MjAzNjkyMTI3MX0.K7M16UbjRvJ7YLf7YcTgEdmCbXz5rq1_jV8ERNUqxFA';

  $client = new Client([
    'base_uri' => $supabaseUrl,
    'headers' => [
      'apikey' => $supabaseKey,
      'Authorization' => 'Bearer ' . $supabaseKey,
      'Content-Type' => 'application/json'
    ]
  ]);

  try {
    $response = $client->post('/rest/v1/users', [
      'json' => [
        'name' => $name,
        'username' => $username,
        'password' => $hashed_password,
        'email' => $email
      ]
    ]);

    $body = json_decode($response->getBody(), true);

    if ($response->getStatusCode() == 201) {
      return ['status' => 'success'];
    } else {
      return ['status' => 'error', 'message' => $body['message']];
    }
  } catch (GuzzleHttp\Exception\ClientException $e) {
    $responseBody = $e->getResponse()->getBody(true);
    return ['status' => 'error', 'message' => $responseBody];
  }
}

function supabase_fetch_user_by_email($email) {
  $supabaseUrl = 'https://ojygetcgjabzpxbmdaax.supabase.co';
  $supabaseKey = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpc3MiOiJzdXBhYmFzZSIsInJlZiI6Im9qeWdldGNnamFienB4Ym1kYWF4Iiwicm9sZSI6ImFub24iLCJpYXQiOjE3MjEzNDUyNzEsImV4cCI6MjAzNjkyMTI3MX0.K7M16UbjRvJ7YLf7YcTgEdmCbXz5rq1_jV8ERNUqxFA';

  $client = new Client([
    'base_uri' => $supabaseUrl,
    'headers' => [
      'apikey' => $supabaseKey,
      'Authorization' => 'Bearer ' . $supabaseKey,
      'Content-Type' => 'application/json'
    ]
  ]);

  try {
    $response = $client->get('/rest/v1/users', [
      'query' => [
        'email' => 'eq.' . $email
      ]
    ]);

    $body = json_decode($response->getBody(), true);
    return $body ? $body[0] : null;
  } catch (GuzzleHttp\Exception\ClientException $e) {
    $responseBody = $e->getResponse()->getBody(true);
    return ['status' => 'error', 'message' => $responseBody];
  }
}

function supabase_get_users_groups($user_id){
  $supabaseUrl = 'https://ojygetcgjabzpxbmdaax.supabase.co';
  $supabaseKey = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpc3MiOiJzdXBhYmFzZSIsInJlZiI6Im9qeWdldGNnamFienB4Ym1kYWF4Iiwicm9sZSI6ImFub24iLCJpYXQiOjE3MjEzNDUyNzEsImV4cCI6MjAzNjkyMTI3MX0.K7M16UbjRvJ7YLf7YcTgEdmCbXz5rq1_jV8ERNUqxFA';


  $client = new Client([
    'base_uri' => $supabaseUrl,
    'headers' => [
      'apikey' => $supabaseKey,
      'Authorization' => 'Bearer ' . $supabaseKey,
      'Content-Type' => 'application/json'
    ]
  ]);

  try {
    $response = $client->get('/rest/v1/book_group', []);

    $body = json_decode($response->getBody(), true);
    return $body ? $body[0] : null;

  } catch (GuzzleHttp\Exception\ClientException $e) {
    $responseBody = $e->getResponse()->getBody(true);
    return ['status' => 'error', 'message' => $responseBody];
  }

}
?>
