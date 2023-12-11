<!-- http://localhost/elearning/database/kelas-api.php -->

<?php
$con = mysqli_connect("localhost", "root", "", "elearning-api");

if (!$con) {
    die("Database connection failed: " . mysqli_connect_error());
}

// Handle DELETE request
if ($_SERVER['REQUEST_METHOD'] === 'DELETE') {
    $data = json_decode(file_get_contents("php://input"), true);
    $kelas_id = mysqli_real_escape_string($con, $data['id']);

    $deleteSql = "DELETE FROM kelas WHERE id = ?";
    $stmt = mysqli_prepare($con, $deleteSql);
    mysqli_stmt_bind_param($stmt, "i", $kelas_id);
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
    $kelas_id = mysqli_real_escape_string($con, $data['id']);
    $new_nama_kelas = mysqli_real_escape_string($con, $data['nama_kelas']);

    $updateSql = "UPDATE kelas SET nama_kelas = ? WHERE id = ?";
    $stmt = mysqli_prepare($con, $updateSql);
    mysqli_stmt_bind_param($stmt, "si", $new_nama_kelas, $kelas_id);
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

        $nama_mapel = mysqli_real_escape_string($con, $data['nama_kelas']);

        $insertSql = "INSERT INTO kelas (nama_kelas) VALUES (?)";
        $stmt = mysqli_prepare($con, $insertSql);
        mysqli_stmt_bind_param($stmt, "s", $nama_mapel);
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
    $sql = "SELECT * FROM kelas";
    $result = mysqli_query($con, $sql);

    if ($result) {
        header("Content-Type: application/json");
        $response = array();

        while ($row = mysqli_fetch_assoc($result)) {
            $response[] = array(
                'id' => $row['id'],
                'nama_kelas' => $row['nama_kelas']
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
