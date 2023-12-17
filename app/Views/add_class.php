<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Kelas Baru</title>
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }

        h2 {
            text-align: center;
        }

        #addKelasForm {
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

    <h2>Tambah Kelas Baru</h2>
    <form id="addKelasForm">
        <label for="nama_kelas">Name Class</label>
        <input type="text" id="nama_kelas" required>

        <button type="button" onclick="addClass()">Add Class</button>
    </form>

    <script>
        const apiUrlKelas = 'http://localhost/elearning/database/kelas-api.php';

        async function addClass() {
            const NameClass = document.getElementById('nama_kelas').value;

            console.log("Adding Class:", {
                nama_kelas
            });

            try {
                const response = await fetch(apiUrlKelas, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                    },
                    body: JSON.stringify({
                        nama_kelas
                    }),
                });

                if (response.ok) {
                    console.log("Class added successfully!");
                    // Redirect back to the main page after adding the jadwal
                    window.location.href = '<?= base_url('./guru_kelas') ?>';
                } else {
                    console.error('Failed to add Class');
                    console.error(await response.text());
                }
            } catch (error) {
                console.error('Error adding Class:', error);
            }
        }

        // Remove the updateJadwal function from here, as it is not needed in this file.
    </script>

</body>

</html>