<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Section Baru</title>
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }

        h2 {
            text-align: center;
        }

        #addSectionForm {
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

    <h2>Tambah Section Baru</h2>
    <form id="addJadwalForm">
        <label for="nama_pel">Nama Pelajaran:</label>
        <input type="text" id="nama_pel" required>

        <label for="materi_ajar">Materi Ajar:</label>
        <input type="text" id="materi_ajar" required>

        <button type="button" onclick="addSection()">Tambahkan Jadwal</button>
    </form>

    <script>
        const apiUrlSection = 'http://localhost/elearning/database/pelajaran-api.php';

        async function addSection() {
            const NamaPelajaran = document.getElementById('nama_pel').value;
            const MateriAjar = document.getElementById('materi_ajar').value;

            console.log("Adding Section:", {
                nama_pel,
                materi_ajar
            });

            try {
                const response = await fetch(apiUrlSection, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                    },
                    body: JSON.stringify({
                        nama_pel,
                        materi_ajar
                    }),
                });

                if (response.ok) {
                    console.log("Section added successfully!");
                    // Redirect back to the main page after adding the jadwal
                    window.location.href = '<?= base_url('./kelas_mat_guru') ?>';
                } else {
                    console.error('Failed to add Section');
                    console.error(await response.text());
                }
            } catch (error) {
                console.error('Error adding Section:', error);
            }
        }

        // Remove the updateJadwal function from here, as it is not needed in this file.
    </script>

</body>

</html>