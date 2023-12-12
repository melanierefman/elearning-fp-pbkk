<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$con = mysqli_connect("localhost", "root", "", "elearning-api");

if (!$con) {
    die("Database connection failed: " . mysqli_connect_error());
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the raw POST data
    $postdata = file_get_contents("php://input");

    // Check if data is not empty
    if (!empty($postdata)) {
        // Decode JSON data
        $data = json_decode($postdata, true);
        // var_dump($data); // Check if data is received correctly

        // Assuming JSON data contains necessary fields for a new siswa
        $nama_siswa = isset($data['nama_siswa']) ? mysqli_real_escape_string($con, $data['nama_siswa']) : '';
        $nis = isset($data['nis']) ? mysqli_real_escape_string($con, $data['nis']) : '';
        $kelas_siswa = isset($data['kelas_siswa']) ? mysqli_real_escape_string($con, $data['kelas_siswa']) : '';
        $password_siswa = isset($data['password_siswa']) ? mysqli_real_escape_string($con, $data['password_siswa']) : '';

        // Use prepared statement to prevent SQL injection
        $insertSql = "INSERT INTO siswa (nama_siswa, nis, kelas_siswa, password_siswa) VALUES (?, ?, ?, ?)";
        $stmt = mysqli_prepare($con, $insertSql);

        // Bind parameters
        mysqli_stmt_bind_param($stmt, "ssss", $nama_siswa, $nis, $kelas_siswa, $password_siswa);

        // Execute statement
        $insertResult = mysqli_stmt_execute($stmt);

        if ($insertResult) {
            http_response_code(201); // Created
            echo json_encode(['message' => 'Data inserted successfully']);
        } else {
            http_response_code(500); // Internal Server Error
            echo json_encode(['error' => 'Error inserting data: ' . mysqli_error($con)]);
        }

        // Close the statement
        mysqli_stmt_close($stmt);
    } else {
        http_response_code(400); // Bad Request
        echo json_encode(['error' => 'Invalid JSON data']);
    }
}

// Fetch data
$sql = "SELECT * FROM siswa";
$result = mysqli_query($con, $sql);

if ($result) {
    header("Content-Type: application/json");
    $response = array();

    while ($row = mysqli_fetch_assoc($result)) {
        $response[] = array(
            'id' => $row['id'],
            'nama_siswa' => $row['nama_siswa'],
            'nis' => $row['nis'],
            'kelas_siswa' => $row['kelas_siswa'],
            'password_siswa' => $row['password_siswa']
        );
    }

    echo json_encode($response, JSON_PRETTY_PRINT);
} else {
    http_response_code(500); // Internal Server Error
    echo json_encode(['error' => 'Error fetching data: ' . mysqli_error($con)]);
}

// Close the database connection
mysqli_close($con);
