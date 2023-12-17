<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Section Baru</title>
    <style>
        .login-page {
        width: 360px;
        padding: 8% 0 0;
        margin: auto;
        }
        .form {
        position: relative;
        z-index: 1;
        background: #FFFFFF;
        max-width: 360px;
        margin: 0 auto 100px;
        padding: 45px;
        text-align: center;
        box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.2), 0 5px 5px 0 rgba(0, 0, 0, 0.24);
        }
        .form input {
        font-family: 'Inter', sans-serif;
        outline: 0;
        background: #f2f2f2;
        width: 100%;
        border: 0;
        margin: 0 0 15px;
        padding: 15px;
        box-sizing: border-box;
        font-size: 14px;
        }
        .form button {
        font-family: 'Inter', sans-serif;
        text-transform: uppercase;
        outline: 0;
        background: #4778EC;
        width: 100%;
        border: 0;
        padding: 15px;
        color: #FFFFFF;
        font-size: 14px;
        -webkit-transition: all 0.3 ease;
        transition: all 0.3 ease;
        cursor: pointer;
        }
        .form button:hover,.form button:active,.form button:focus {
        background: #4778EC;
        }
        .form .message {
        margin: 15px 0 0;
        color: #b3b3b3;
        font-size: 12px;
        }
        .form .message a {
        color: #4778EC;
        text-decoration: none;
        }
        .form .register-form {
        display: none;
        }
        .container {
        position: relative;
        z-index: 1;
        max-width: 300px;
        margin: 0 auto;
        }
        .container:before, .container:after {
        content: "";
        display: block;
        clear: both;
        }
        .container .info {
        margin: 50px auto;
        text-align: center;
        }
        .container .info h1 {
        margin: 0 0 15px;
        padding: 0;
        font-size: 36px;
        font-weight: 300;
        color: #1a1a1a;
        }
        .container .info span {
        color: #4d4d4d;
        font-size: 12px;
        }
        .container .info span a {
        color: #000000;
        text-decoration: none;
        }
        .container .info span .fa {
        color: #EF3B3A;
        }
        body {
        background: #FFFFFF;
        font-family: 'Inter', sans-serif;
        -webkit-font-smoothing: antialiased;
        -moz-osx-font-smoothing: grayscale;      
        }
        h2 {
            text-align: center;
        }
    </style>
</head>

<body>

    <!-- <h2>Tambah Section Baru</h2>
    <form id="addJadwalForm">
        <label for="nama_pel">Nama Pelajaran:</label>
        <input type="text" id="nama_pel" required>

        <label for="materi_ajar">Materi Ajar:</label>
        <input type="text" id="materi_ajar" required>

        <button type="button" onclick="addSection()">Tambahkan Jadwal</button>
    </form> -->
    <h2>Add Section</h2>
    <div class="login-page">
        <div class="form">
            <form class="login-form">
            <input type="text" id="nama_pel" placeholder="Hari" required/>
            <input type="text" id="materi_ajar" placeholder="Waktu" required/>
            <button type="button" onclick="addSection()">Tambahkan Section</button>
            </form>
        </div>
    </div>

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