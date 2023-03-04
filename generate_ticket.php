<?php
require_once('config/database.php');
// todo: get argumen from command
$event_id = $argv[1];
$total_ticket = $argv[2];

//todo: Untuk menghasilkan karakter acak
function generateRandomString($length = 7)
{
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

// todo: Untuk menghasilkan prefix random
function generate_random_prefix($length = 3)
{
    $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $random_string_prefix = '';
    for ($i = 0; $i < $length; $i++) {
        $random_string_prefix .= $characters[rand(0, $charactersLength - 1)];
    }
    return $random_string_prefix;
}

//todo: Untuk menghasilkan kode tiket dengan format yang ditentukan
function generateTicketCode()
{
    $randomStringPrefix = generate_random_prefix();
    $randomString = generateRandomString();
    return $randomStringPrefix . $randomString;
}

// todo: Example in cli: php generate_ticket.php 2 3000
try {
    for ($i = 1; $i <= $total_ticket; $i++) {
        $ticket_code = generateTicketCode();
        $status = 'available';
        $query_insert = $connection->prepare("insert into event_ticket (event_id, ticket, status, created_at, updated_at) values(?, ?, ?, ?, ?)");
        $query_insert->bind_param('sssss', $event_id, $ticket_code, $status, $current_time, $current_time);
        $query_insert->execute();
    }
    echo "Generate ticket success." . "\n";
    die();
} catch (\Throwable $th) {
    echo json_encode([
        'status' => false,
        'message' => $th->getMessage(),
    ]);
}
