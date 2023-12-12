<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teacher Registration</title>
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

    <h2>Teacher Registration</h2>
    <form id="registrationForm">
        <label for="nama_guru">Name:</label>
        <input type="text" id="nama_guru" required>

        <label for="nip">NIP:</label>
        <input type="text" id="nip" required>

        <label for="password_guru">Password:</label>
        <input type="password" id="password_guru" required>

        <button type="button" onclick="registerTeacher()">Register</button>
    </form>

    <script>
        const apiUrl = 'http://localhost/elearning/database/guru-api.php';

        async function registerTeacher() {
            const nama_guru = document.getElementById('nama_guru').value;
            const nip = document.getElementById('nip').value;
            const password_guru = document.getElementById('password_guru').value;

            console.log("Registering teacher:", {
                nama_guru,
                nip,
                password_guru
            });

            try {
                const response = await fetch(apiUrl, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                    },
                    body: JSON.stringify({
                        nama_guru,
                        nip,
                        password_guru
                    }),
                });

                if (response.ok) {
                    console.log("Teacher registered successfully!");
                    // You can redirect the user to another page if needed
                    window.location.href = '<?= base_url('./login_guru') ?>';
                } else {
                    console.error('Failed to register teacher');
                    console.error(await response.text());
                    alert('Error during registration');
                }
            } catch (error) {
                console.error('Error registering teacher:', error);
                alert('Error during registration');
            }
        }
    </script>

</body>

</html>