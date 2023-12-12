<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Jadwal</title>
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }

        h2 {
            text-align: center;
        }

        #addJadwalForm {
            width: 50%;
            margin: 20px auto;
        }

        label {
            display: block;
            margin-bottom: 5px;
        }

        input {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
        }

        button {
            padding: 10px;
            background-color: #3498db;
            /* Blue */
            color: #fff;
            /* White text */
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
    </style>
</head>

<body>

    <h2>Add Jadwal</h2>
    <form id="addJadwalForm">
        <label for="hari">Hari:</label>
        <input type="text" id="hari" required>

        <label for="waktu">Waktu:</label>
        <input type="text" id="waktu" required>

        <label for="kelas">Kelas:</label>
        <input type="text" id="kelas" required>

        <button type="button" onclick="addJadwal()">Add Jadwal</button>
    </form>

    <script>
        const apiUrl = 'http://localhost/elearning/database/jadwal-api.php';

        // Function to add a new jadwal
        async function addJadwal() {
            const hari = document.getElementById('hari').value;
            const waktu = document.getElementById('waktu').value;
            const kelas = document.getElementById('kelas').value;

            console.log("Adding jadwal:", {
                hari,
                waktu,
                kelas
            });

            const response = await fetch(apiUrl, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify([{
                    hari,
                    waktu,
                    kelas
                }]),
            });

            if (response.ok) {
                console.log("Jadwal added successfully!");
                // Redirect back to the main page after adding the jadwal
                window.location.href = '<?= base_url('./jadwal') ?>';
            } else {
                console.error('Failed to add jadwal');
            }
        }
    </script>

</body>

</html>