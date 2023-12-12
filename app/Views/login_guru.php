<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teacher Login</title>
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

    <h2>Teacher Login</h2>
    <form id="loginForm">
        <label for="nip">NIP:</label>
        <input type="text" id="nip" required>

        <label for="password_guru">Password:</label>
        <input type="password" id="password_guru" required>

        <button type="button" onclick="loginTeacher()">Login</button>
    </form>

    <script>
        const apiUrl = 'http://localhost/elearning/database/guru-api.php';

        async function loginTeacher() {
            const nip = document.getElementById('nip').value;
            const password_guru = document.getElementById('password_guru').value;

            console.log("Logging in teacher:", {
                nip,
                password_guru
            });

            try {
                const response = await fetch(apiUrl);
                const data = await response.json();

                const foundTeacher = data.find(teacher => teacher.nip === nip && teacher.password_guru === password_guru);

                if (foundTeacher) {
                    console.log("Login successful!");
                    // You can redirect the user to another page if needed
                    window.location.href = '<?= base_url('./guru_beranda') ?>';
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