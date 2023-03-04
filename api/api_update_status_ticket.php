<?php

require_once('../config/database.php');

$event_id = $_POST['event_id'];
$ticket_code = $_POST['ticket_code'];
$status = $_POST['status'];
date_default_timezone_set('Asia/Jakarta');
$updated_at = date('Y-m-d H:i:s');

// todo: check status is_empty?
if (empty($event_id)) {
    echo json_encode([
        'message' => 'Event id can not be null'
    ]);
    die();
} else if (empty($status)) {
    echo json_encode([
        'message' => 'Status can not be null'
    ]);
    die();
}

$find_ticket = mysqli_query($connection, "select * from event_ticket where ticket = '$ticket_code' and event_id = $event_id");
$result = [];
while ($data = mysqli_fetch_array($find_ticket)) {
    array_push($result, [
        'ticket' => $data['ticket'],
        'status' => $data['status'],
    ]);
}
$ticket_is_exists = count($result);
if ($ticket_is_exists > 0) {
    $query_update = mysqli_query($connection, "update event_ticket set status = '$status', updated_at = '$updated_at' where ticket = '$ticket_code' and event_id = $event_id");
    if ($query_update) {
        echo json_encode([
            'ticket_code' => $ticket_code,
            'status' => $status,
            'updated_at' => $updated_at,
        ]);
    } else {
        echo json_encode([
            'message' => 'Oops, something error'
        ]);
    }
    die();
} else {
    echo json_encode([
        'message' => 'Ticket not found'
    ]);
    die();
}
