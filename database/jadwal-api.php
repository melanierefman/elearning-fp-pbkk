<?php
$con = mysqli_connect("localhost", "root", "", "elearning-api");

if (!$con) {
    die("Database connection failed: " . mysqli_connect_error());
}

// Handle DELETE request
if ($_SERVER['REQUEST_METHOD'] === 'DELETE') {
    $data = json_decode(file_get_contents("php://input"), true);
    $jadwal_id = mysqli_real_escape_string($con, $data['id']);

    $deleteSql = "DELETE FROM jadwal WHERE id = ?";
    $stmt = mysqli_prepare($con, $deleteSql);
    mysqli_stmt_bind_param($stmt, "i", $jadwal_id);
    $deleteResult = mysqli_stmt_execute($stmt);

    if ($deleteResult) {
        http_response_code(200); // OK
        echo "Data deleted successfully";
    } else {
        http_response_code(500); // Internal Server Error
        echo "Error deleting data: " . mysqli_error($con);
    }

    mysqli_stmt_close($stmt);
    exit; // Stop execution after handling DELETE
}

// Handle PUT/PATCH request (for editing data)
if ($_SERVER['REQUEST_METHOD'] === 'PUT' || $_SERVER['REQUEST_METHOD'] === 'PATCH') {
    $data = json_decode(file_get_contents("php://input"), true);
    $jadwal_id = mysqli_real_escape_string($con, $data['id']);
    $new_hari = mysqli_real_escape_string($con, $data['hari']);
    $new_waktu = mysqli_real_escape_string($con, $data['waktu']);
    $new_kelas = mysqli_real_escape_string($con, $data['kelas']);

    $updateSql = "UPDATE jadwal SET hari = ?, waktu = ?, kelas = ? WHERE id = ?";
    $stmt = mysqli_prepare($con, $updateSql);
    mysqli_stmt_bind_param($stmt, "sssi", $new_hari, $new_waktu, $new_kelas, $jadwal_id);
    $updateResult = mysqli_stmt_execute($stmt);

    if ($updateResult) {
        http_response_code(200); // OK
        echo "Data updated successfully";
    } else {
        http_response_code(500); // Internal Server Error
        echo "Error updating data: " . mysqli_error($con);
    }

    mysqli_stmt_close($stmt);
    exit; // Stop execution after handling PUT/PATCH
}

// Handle POST request (for creating data)
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $postdata = file_get_contents("php://input");

    if (!empty($postdata)) {
        $data = json_decode($postdata, true);

        $hari = mysqli_real_escape_string($con, $data['hari']);
        $waktu = mysqli_real_escape_string($con, $data['waktu']);
        $kelas = mysqli_real_escape_string($con, $data['kelas']);

        $insertSql = "INSERT INTO jadwal (hari, waktu, kelas) VALUES (?, ?, ?)";
        $stmt = mysqli_prepare($con, $insertSql);
        mysqli_stmt_bind_param($stmt, "sss", $hari, $waktu, $kelas);
        $insertResult = mysqli_stmt_execute($stmt);

        if ($insertResult) {
            http_response_code(201); // Created
            echo "Data inserted successfully";
        } else {
            http_response_code(500); // Internal Server Error
            echo "Error inserting data: " . mysqli_error($con);
        }

        mysqli_stmt_close($stmt);
    } else {
        http_response_code(400); // Bad Request
        echo "Invalid JSON data";
    }
} elseif ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $sql = "SELECT * FROM jadwal";
    $result = mysqli_query($con, $sql);

    if ($result) {
        header("Content-Type: application/json");
        $response = array();

        while ($row = mysqli_fetch_assoc($result)) {
            $response[] = array(
                'id' => $row['id'],
                'hari' => $row['hari'],
                'waktu' => $row['waktu'],
                'kelas' => $row['kelas']
            );
        }

        echo json_encode($response, JSON_PRETTY_PRINT);
    } else {
        http_response_code(500); // Internal Server Error
        echo "Error fetching data: " . mysqli_error($con);
    }
}

// Close the database connection
mysqli_close($con);
