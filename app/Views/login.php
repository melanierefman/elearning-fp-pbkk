<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Login</title>
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }

        h2 {
            text-align: center;
        }

        #loginForm {
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

    <h2>Student Login</h2>
    <form id="loginForm">
        <label for="nis">NIS:</label>
        <input type="text" id="nis" required>

        <label for="password_siswa">Password:</label>
        <input type="password" id="password_siswa" required>

        <button type="button" onclick="loginStudent()">Login</button>
    </form>

    <script>
        const apiUrl = 'http://localhost/elearning/database/siswa-api.php';

        async function loginStudent() {
            const nis = document.getElementById('nis').value;
            const password_siswa = document.getElementById('password_siswa').value;

            console.log("Logging in student:", {
                nis,
                password_siswa
            });

            try {
                const response = await fetch(apiUrl);
                const data = await response.json();

                const foundStudent = data.find(student => student.nis === nis && student.password_siswa === password_siswa);

                if (foundStudent) {
                    console.log("Login successful!");
                    // You can redirect the user to another page if needed
                    window.location.href = '<?= base_url('./') ?>';
                } else {
                    console.error('Login failed');
                    alert('Login failed. Please check your credentials.');
                }
            } catch (error) {
                console.error('Error during login:', error);
                alert('Error during login');
            }
        }
    </script>

</body>

</html>