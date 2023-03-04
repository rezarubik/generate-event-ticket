<?php

require_once('../config/database.php');

$event_id = $_POST['event_id'];
$ticket_code = $_POST['ticket_code'];
$status = $_POST['status'];
date_default_timezone_set('Asia/Jakarta');
$current_time = date('Y-m-d H:i:s');

// todo: Check ticket is exists
$ticket = mysqli_query($connection, "select * from event_ticket where ticket='$ticket_code'");
$check_ticket = [];
while ($data = mysqli_fetch_array($ticket)) {
    array_push($check_ticket, [
        'ticket' => $data['ticket'],
        'status' => $data['status'],
    ]);
}
if (count($check_ticket) > 0) {
    echo json_encode([
        'message' => 'Ticket already exists'
    ]);
    die();
}

// todo: Insert into table event_ticket
$query_insert = $connection->prepare("insert into event_ticket (event_id, ticket, status, created_at, updated_at) values(?, ?, ?, ?, ?)");
$query_insert->bind_param('sssss', $event_id, $ticket_code, $status, $current_time, $current_time);
$query_insert->execute();
if ($query_insert) {
    echo json_encode([
        'ticket_code' => $ticket_code,
        'status' => $status,
        'message' => 'Data successfull inserted'
    ]);
} else {
    echo json_encode([
        'message' => 'Oops, something error'
    ]);
}
