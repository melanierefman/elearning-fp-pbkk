<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teacher Registration</title>
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

    <h2>Teacher Registration</h2>
    <div class="login-page">
    <div class="form">
    <form class="register-form">
      <input type="text" placeholder="name"/>
      <input type="password" placeholder="password"/>
      <input type="text" placeholder="email address"/>
      <button>create</button>
      <p class="message">Already registered? <a href="#">Sign In</a></p>
    </form>
    <form class="login-form">
      <input type="text" id="nama_guru" placeholder="Nama" required/>
      <input type="text" id="nip" placeholder="NIP" required/>
      <input type="password" id="password_guru" placeholder="Password" required/>
      <button type="button" onclick="registerTeacher()">Register  </button>
      <p class="message">Ready account <a href="./login_guru.php">Log in</a></p>
    </form>
  </div>
</div>

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