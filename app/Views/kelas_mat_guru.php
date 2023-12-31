<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>E-Learning App</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

    <!-- Link to Inter font from Google Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap">

    <style>
        body {
            margin: 0;
            padding-top: 20px;
            font-family: Inter, sans-serif;
        }

        /* Sidebar styling */
        .sidebar {
            height: 100vh;
            width: 250px;
            position: fixed;
            top: 0;
            left: 0;
            background-color: #4829B2;
            color: #fff;
            padding-top: 40px;
            padding-right: 20px;
            padding-bottom: 20px;
            padding-left: 20px;
        }

        .sidebar-brand {
            font-family: 'Abhaya Libre', sans-serif;
            font-weight: 800;
            margin-bottom: 20px;
        }

        .sidebar-nav {
            list-style: none;
            padding-left: 20px;
        }

        .sidebar-nav .nav-item {
            margin-bottom: 20px;
        }

        .sidebar-nav .nav-item a {
            font-family: 'Inter', sans-serif;
        }

        .nav-item1 {
            list-style: none;
            padding-top: 360px;
        }

        .nav-item1 a {
            display: inline-block;
            padding: 0.5rem 1rem;
            text-decoration: none;
            color: red;
            background-color: white;
            border-radius: 10px;
        }

        .nav-item1 a:hover {
            background-color: #fff;
            color: red;
        }

        .user-info {
            display: flex;
            align-items: center;
            justify-content: flex-end;
            padding: 30px;
            padding-bottom: 0px;
        }

        .user-info img {
            border-radius: 50%;
            margin-right: 10px;
            width: 30px;
            height: 30px;
            object-fit: cover;
        }

        .user-info .user-name {
            color: black;
        }

        .container img {
            max-width: 100%;
            height: auto;
            display: block;
            margin: 0 auto;
            /* Center the image */
        }

        .d-flex {
            justify-content: space-between;
            align-items: center;
        }

        /* Add separate containers for pelajaran and tugas */
        .result-container {
            margin: 20px;
        }

        .result-container h5 {
            padding-top: 12px;
            padding-bottom: 12px;
        }

        .result-container .row {
            display: flex;
            gap: 20px;
        }

        .card {
            flex: 1 1 300px;
            /* Added flex property */
            display: flex;
            flex-direction: column;
        }

        .card img {
            flex-grow: 1;
            object-fit: cover;
            height: 100%;
            width: 100%;
        }

        .card-body p.card-text {
            display: inline-block;
            padding: 0.5rem 1rem;
            border-radius: 0.25rem;
            color: #ffffff;
            background-color: #32CA4D;
            /* Set text color to white */
        }
    </style>
</head>

<body>
    <header>
        <div class="sidebar">
            <div style="padding-bottom: 40px; text-align: center; color: white;">
                <a class="sidebar-brand" href="#">
                    <img src="./assets/book.png" alt="Logo" width="30" height="24" class="d-inline-block align-text-top">
                    E-learningApp
                </a>
            </div>
            <ul class="sidebar-nav">
                <li class="nav-item">
                    <span style="display: flex; align-items: center; padding-left: 20px;">
                        <img src="./assets/beranda.png" alt="Logo" width="20" height="20" class="d-inline-block align-text-top">
                        <a class="nav-link active" style="padding-left: 5px;" aria-current="page" href="<?= base_url('#') ?>">Beranda</a>
                    </span>
                </li>
                <li class="nav-item">
                    <span style="display: flex; align-items: center; padding-left: 20px;">
                        <img src="./assets/kelas.png" alt="Logo" width="20" height="20" class="d-inline-block align-text-top">
                        <a class="nav-link active" style="padding-left: 5px;" aria-current="page" href="<?= base_url('./guru_kelas') ?>">Kelas</a>
                    </span>
                </li>
                <li class="nav-item">
                    <span style="display: flex; align-items: center; padding-left: 20px;">
                        <img src="./assets/jadwal.png" alt="Logo" width="20" height="20" class="d-inline-block align-text-top">
                        <a class="nav-link active" style="padding-left: 5px;" aria-current="page" href="<?= base_url('./jadwal_guru') ?>">Jadwal</a>
                    </span>
                </li>
                <li class="nav-item1 text-center">
                    <a class="nav-link active" aria-current="page" href="<?= base_url('./login') ?>">Keluar</a>
                </li>
            </ul>
        </div>
    </header>

    <div style="margin-left: 270px;">
        <div class="d-flex justify-content-between align-items-center">
        <div class="container mt-4" style="width: 70%">
                <form class="form-inline">
                    <div class="d-flex justify-content-between align-items-center">
                        <input class="form-control" type="search" placeholder="Cari kelas sekarang..." id="searchInput" aria-label="Search">
                        <button class="btn btn-primary" type="button" onclick="searchPelajaran()" style="background-color: #4829B2; color: #ffffff;">Cari</button>
                    </div>
                </form>
            </div>
            <div class="container mt-4" style="width: 20%">
                <a href="<?= base_url('./add_section') ?>" class="btn btn-primary" style="background-color: #4829B2; color: #ffffff;">+ Add Section</a>
            </div>

            <div class="user-info">
                <img src="./assets/ellipse-1-bg-eyb.png" alt="Logo" width="48" height="48" class="d-inline-block align-text-top">
                <span>
                    <div class="user-name">Melanie Refman</div>
                    <div class="user-name1" style="font-size: 13px;">Kelas 12</div>
                </span>
            </div>
        </div>

        <!-- Add separate containers for pelajaran and tugas -->
        <div class="result-container">
            <img src="./assets/welcome_guru.png" class="img-fluid" style="padding-bottom: 40px;"><br>
            <div class="row" id="resultPelajaran"></div>
        </div>
    </div>


    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const apiUrlPelajaran = "http://localhost/elearning/database/pelajaran-api.php";
            let allPelajaran = [];

            // Load all pelajaran and tugas on page load
            window.addEventListener('load', function() {
                // Fetch pelajaran
                fetch(apiUrlPelajaran)
                    .then(response => response.json())
                    .then(function(data) {
                        allPelajaran = data;
                        renderPelajaran(allPelajaran);
                    })
                    .catch(handleError);

            });

            // Search pelajaran on button click
            window.searchPelajaran = function() {
                const searchTerm = document.getElementById("searchInput").value.trim();

                if (searchTerm === "") {
                    renderPelajaran(allPelajaran);
                } else {
                    const filteredPelajaran = filterPelajaran(allPelajaran, searchTerm);
                    renderPelajaran(filteredPelajaran);
                }
            };

            function renderPelajaran(pelajaran) {
                const pelajaranContainer = document.getElementById("resultPelajaran");
                pelajaranContainer.innerHTML = "";

                pelajaran.forEach(pel => {
                    const card = document.createElement('div');
                    card.classList.add('mb-3');

                    card.innerHTML = `
                    <div class="card shadow d-flex flex-column" style="align-items: flex-start;">
                        <div class="card-body img-fuild">
                            <p class="card-title">${pel.nama_pel}</p>
                            <h6 class="card-title">${pel.materi_ajar}</h6>
                        </div>
                    </div>
                    `;

                    pelajaranContainer.appendChild(card);
                });
            }

            function filterPelajaran(pelajaran, searchTerm) {
                return pelajaran.filter(pel => {
                    const searchableText = `${pel.nama_pel} ${pel.materi_ajar}`.toLowerCase();
                    return searchableText.includes(searchTerm.toLowerCase());
                });
            }

            function handleError(error) {
                alert("Terjadi kesalahan dalam mengambil data");
                console.error(error);
            }
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>

</html>