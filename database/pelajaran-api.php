<!-- http://localhost/elearning/database/pelajaran-api.php -->

<?php
$con = mysqli_connect("localhost", "root", "", "elearning-api");

if (!$con) {
    die("Database connection failed: " . mysqli_connect_error());
}

// Handle DELETE request
if ($_SERVER['REQUEST_METHOD'] === 'DELETE') {
    $data = json_decode(file_get_contents("php://input"), true);
    $pelajaran_id = mysqli_real_escape_string($con, $data['id']);

    $deleteSql = "DELETE FROM pelajaran WHERE id = ?";
    $stmt = mysqli_prepare($con, $deleteSql);
    mysqli_stmt_bind_param($stmt, "i", $pelajaran_id);
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
    $pelajaran_id = mysqli_real_escape_string($con, $data['id']);
    $new_nama_pel = mysqli_real_escape_string($con, $data['nama_pel']);
    $new_materi_ajar = mysqli_real_escape_string($con, $data['materi_ajar']);

    $updateSql = "UPDATE pelajaran SET nama_pel = ?, materi_ajar = ? WHERE id = ?";
    $stmt = mysqli_prepare($con, $updateSql);
    mysqli_stmt_bind_param($stmt, "ssi", $new_nama_pel, $new_materi_ajar, $pelajaran_id);
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

        $nama_pel = mysqli_real_escape_string($con, $data['nama_pel']);
        $materi_ajar = mysqli_real_escape_string($con, $data['materi_ajar']);

        $insertSql = "INSERT INTO pelajaran (nama_pel, materi_ajar) VALUES (?, ?)";
        $stmt = mysqli_prepare($con, $insertSql);
        mysqli_stmt_bind_param($stmt, "ss", $nama_pel, $materi_ajar);
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
    $sql = "SELECT * FROM pelajaran";
    $result = mysqli_query($con, $sql);

    if ($result) {
        header("Content-Type: application/json");
        $response = array();

        while ($row = mysqli_fetch_assoc($result)) {
            $response[] = array(
                'id' => $row['id'],
                'nama_pel' => $row['nama_pel'],
                'materi_ajar' => $row['materi_ajar']
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
