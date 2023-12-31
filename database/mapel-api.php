<!-- http://localhost/elearning/database/mapel-api.php -->

<?php
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

        // Assuming JSON data contains necessary fields for a new mapel
        $nama_mapel = mysqli_real_escape_string($con, $data['nama_mapel']);
        $deskripsi_mapel = mysqli_real_escape_string($con, $data['deskripsi_mapel']);

        // Use prepared statement to prevent SQL injection
        $insertSql = "INSERT INTO mapel (nama_mapel, deskripsi_mapel) VALUES (?, ?)";
        $stmt = mysqli_prepare($con, $insertSql);

        // Bind parameters
        mysqli_stmt_bind_param($stmt, "ss", $nama_mapel, $deskripsi_mapel);

        // Execute statement
        $insertResult = mysqli_stmt_execute($stmt);

        if ($insertResult) {
            http_response_code(201); // Created
            echo "Data inserted successfully";
        } else {
            http_response_code(500); // Internal Server Error
            echo "Error inserting data: " . mysqli_error($con);
        }

        // Close the statement
        mysqli_stmt_close($stmt);
    } else {
        http_response_code(400); // Bad Request
        echo "Invalid JSON data";
    }
}

// Fetch data
$sql = "SELECT * FROM mapel";
$result = mysqli_query($con, $sql);

if ($result) {
    header("Content-Type: application/json");
    $response = array();

    while ($row = mysqli_fetch_assoc($result)) {
        $response[] = array(
            'id' => $row['id'],
            'nama_mapel' => $row['nama_mapel'],
            'deskripsi_mapel' => $row['deskripsi_mapel']
        );
    }

    echo json_encode($response, JSON_PRETTY_PRINT);
} else {
    http_response_code(500); // Internal Server Error
    echo "Error fetching data: " . mysqli_error($con);
}

// Close the database connection
mysqli_close($con);
