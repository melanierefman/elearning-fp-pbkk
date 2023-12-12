<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Jadwal</title>
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }

        h2 {
            text-align: center;
        }

        #editJadwalForm {
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

    <h2>Edit Jadwal</h2>
    <form id="editJadwalForm">
        <!-- Hidden input to store the jadwal ID -->
        <input type="hidden" id="jadwalId" required>

        <label for="hari">Hari:</label>
        <input type="text" id="hari" required>

        <label for="waktu">Waktu:</label>
        <input type="text" id="waktu" required>

        <label for="kelas">Kelas:</label>
        <input type="text" id="kelas" required>

        <button type="button" onclick="updateJadwal()">Update Jadwal</button>
    </form>

    <script>
        const apiUrlJadwal = 'http://localhost/elearning/database/jadwal-api.php';

        async function fetchJadwalDetails(jadwalId) {
            try {
                const response = await fetch(`${apiUrlJadwal}/${jadwalId}`);
                const data = await response.json();

                // Populate the form fields with jadwal details
                document.getElementById('jadwalId').value = data.id;
                document.getElementById('hari').value = data.hari;
                document.getElementById('waktu').value = data.waktu;
                document.getElementById('kelas').value = data.kelas;
            } catch (error) {
                console.error('Error fetching jadwal details:', error);
            }
        }

        async function updateJadwal() {
            const jadwalId = document.getElementById('jadwalId').value;
            const hari = document.getElementById('hari').value;
            const waktu = document.getElementById('waktu').value;
            const kelas = document.getElementById('kelas').value;

            console.log("Updating jadwal:", {
                jadwalId,
                hari,
                waktu,
                kelas
            });

            try {
                const response = await fetch(`${apiUrlJadwal}/${jadwalId}`, {
                    method: 'PUT',
                    headers: {
                        'Content-Type': 'application/json',
                    },
                    body: JSON.stringify({
                        hari,
                        waktu,
                        kelas
                    }),
                });

                if (response.ok) {
                    console.log("Jadwal updated successfully!");
                    // Redirect back to the main page after updating the jadwal
                    window.location.href = '<?= base_url('./jadwal') ?>';
                } else {
                    console.error('Failed to update jadwal');
                    console.error(await response.text());
                }
            } catch (error) {
                console.error('Error updating jadwal:', error);
            }
        }

        // Fetch jadwal details when the page loads
        const urlParams = new URLSearchParams(window.location.search);
        const jadwalId = urlParams.get('id');
        fetchJadwalDetails(jadwalId);
    </script>

</body>

</html>