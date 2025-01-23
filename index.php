<?php
// Set the content-type for the response to be JSON
header('Content-Type: application/json');

// Get the raw POST data from the front-end (as JSON)
$data = json_decode(file_get_contents("php://input"), true);

// Check if the data is received
if ($data) {
    $name = $data['name'];
    $email = $data['email'];
    $message = $data['message'];

    // Here, you can process the data (e.g., save it to a database, send an email, etc.)
    // For now, we'll just return the received data as a success response.

    $response = [
        'status' => 'success',
        'message' => 'Data received successfully',
        'name' => $name,
        'email' => $email,
        'message' => $message
    ];

    // Send the response back to the front end as JSON
    echo json_encode($response);
} else {
    // If no data received, send an error response
    echo json_encode(['status' => 'error', 'message' => 'No data received']);
}
?>