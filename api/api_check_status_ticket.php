<?php

require_once('../config/database.php');

$params = $_GET;
$event_id = $_GET['event_id'];
$ticket_code = $_GET['ticket_code'];


// todo: check if event_id is_int?
if (!is_numeric($event_id)) {
    echo json_encode([
        'message' => 'Event id must be number'
    ]);
    die();
}

if (empty($params)) {
    $query = mysqli_query($connection, "select * from event_ticket");
    $results = [];
    while ($data = mysqli_fetch_array($query)) {
        array_push($results, [
            'id' => $data['id'],
            'event_id' => $data['event_id'],
            'ticket' => $data['ticket'],
            'status' => $data['status'],
        ]);
    }
    echo json_encode([
        'data' => $results,
    ]);
} else {
    $query = mysqli_query($connection, "select * from event_ticket where event_id=$event_id and ticket='$ticket_code'");
    $result = [];
    while ($data = mysqli_fetch_array($query)) {
        array_push($result, [
            'ticket_code' => $data['ticket'],
            'status' => $data['status'],
        ]);
    }

    if (count($result) == 0) {
        echo json_encode([
            'message' => 'Ticket not found',
        ]);
        die();
    }
    echo json_encode($result);
}
