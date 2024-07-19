<!DOCTYPE html>

<html>

<body>

<?php

echo "Connecting to db...";
// TODO: Configure [YOUR-PASSWORD] so that we are grabbing it from the .env file
$db_conn_string = "user=postgres.ojygetcgjabzpxbmdaax password=[YOUR-PASSWORD] host=aws-0-us-east-1.pooler.supabase.com port=6543 dbname=postgres";

pg_connect($db_conn_string);

echo "Connected!";

// pg_query("create table testing(id integer)");


?>

</body>