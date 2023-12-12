<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Registration</title>
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }

        h2 {
            text-align: center;
        }

        #registrationForm {
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

    <h2>Student Registration</h2>
    <form id="registrationForm">
        <label for="nama_siswa">Name:</label>
        <input type="text" id="nama_siswa" required>

        <label for="nis">NIS:</label>
        <input type="text" id="nis" required>

        <label for="kelas_siswa">Class:</label>
        <input type="text" id="kelas_siswa" required>

        <label for="password_siswa">Password:</label>
        <input type="password" id="password_siswa" required>

        <button type="button" onclick="registerStudent()">Register</button>
    </form>

    <script>
        const apiUrl = 'http://localhost/elearning/database/siswa-api.php';

        async function registerStudent() {
            const nama_siswa = document.getElementById('nama_siswa').value;
            const nis = document.getElementById('nis').value;
            const kelas_siswa = document.getElementById('kelas_siswa').value;
            const password_siswa = document.getElementById('password_siswa').value;

            console.log("Registering student:", {
                nama_siswa,
                nis,
                kelas_siswa,
                password_siswa
            });

            try {
                const response = await fetch(apiUrl, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                    },
                    body: JSON.stringify({
                        nama_siswa,
                        nis,
                        kelas_siswa,
                        password_siswa
                    }),
                });

                if (response.ok) {
                    console.log("Student registered successfully!");
                    // You can redirect the user to another page if needed
                    window.location.href = '<?= base_url('./login') ?>';
                } else {
                    console.error('Failed to register student');
                    console.error(await response.text());
                    alert('Error during registration');
                }
            } catch (error) {
                console.error('Error registering student:', error);
                alert('Error during registration');
            }
        }
    </script>

</body>

</html>