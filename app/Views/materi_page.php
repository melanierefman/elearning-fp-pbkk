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
            background-color: #E8EFF6;
        }

        .card-body p.card-text {
            display: inline-block;
            padding: 0.5rem 1rem;
            border-radius: 0.25rem;
            color: #ffffff;
            background-color: #32CA4D;
            /* Set text color to white */
        }
        img {
            max-width: 100%;
            height: auto;
            display: block; 
            margin-left: 50px; 
        }
        
    </style>
</head>

<body>
    
    <div style="text-align: center; color: black; font-size: 36px; font-family: Inter; font-weight: 700; word-wrap: break-word">Mathematics <br/>Chapter 2: Principles of Algebraic Equations</div>
    <img src="./assets/materi.png" alt="materi" width="1200" width="600">


    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const apiUrlPelajaran = "http://localhost/elearning/database/pelajaran-api.php";
            const apiUrlTugas = "http://localhost/elearning/database/tugas-api.php";
            let allPelajaran = [];
            let allTugas = [];

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

                // Fetch tugas
                fetch(apiUrlTugas)
                    .then(response => response.json())
                    .then(function(data) {
                        allTugas = data;
                        renderTugas(allTugas);
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
                    card.classList.add('col-4', 'col-md-2', 'mb-3');

                    card.innerHTML = `
                    <div class="card shadow">
                        <div class="card-body img-fuild d-flex flex-column">
                            <img src="./assets/mtk.png" alt="Logo" width="50" height="50" class="d-inline-block align-text-top mb-3">
                            <p class="card-text">${pel.nama_pel}</p>
                            <h6 class="card-title">${pel.materi_ajar}</h6>
                        </div>
                    </div>
                `;

                    pelajaranContainer.appendChild(card);
                });
            }

            function renderTugas(tugas) {
                const tugasContainer = document.getElementById("resultTugas");
                tugasContainer.innerHTML = "";

                tugas.forEach(tugasItem => {
                    const card = document.createElement('div');
                    card.classList.add('mb-3'); // Add margin-bottom for spacing

                    card.innerHTML = `
                    <div class="card shadow d-flex flex-column">
                        <div class="card-body img-fuild">
                            <h6 class="card-title">${tugasItem.nama_tugas}</h6>
                            <p class="card-title">${tugasItem.deadline}</p>
                        </div>
                    </div>
                `;

                    tugasContainer.appendChild(card);
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