<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Media Ilmu Bookstore</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

    <!-- Link to Inter font from Google Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap">

    <style>
        body {
            margin: 0;
            font-family: Inter, sans-serif;
        }

        /* Navbar styling */
        .navbar {
            background-color: #ffff;
            /* Replace with your desired background color */
            padding: 10px;
        }

        .navbar-brand {
            font-family: 'Abhaya Libre', sans-serif;
            font-weight: 800;
            /* Set font weight to ExtraBold */
            margin-right: 100px;
        }

        .navbar-nav .nav-item {
            margin-right: 50px;
            /* Adjusted margin for each navigation item */
        }

        .navbar-nav .nav-item a {
            font-family: 'Inter', sans-serif;
        }

        .dropdown {
            position: relative;
            display: inline-block;
        }

        .dropdown img {
            border-radius: 50%;
            /* Make the user image circular */
            margin-right: 10px;
            width: 30px;
            /* Set the desired width */
            height: 30px;
            /* Set the desired height */
            object-fit: cover;
            /* Ensure the image covers the circular container */
        }

        .dropdown button {
            border: none;
            background-color: transparent;
            padding: 0;
            cursor: pointer;
            color: #000;
            /* Set the desired text color */
            font-family: 'Inter', sans-serif;
            /* Set the Inter font */
        }

        .dropdown-menu {
            position: absolute;
            top: 100%;
            left: 0;
            z-index: 1000;
            display: none;
            float: left;
            min-width: 160px;
            text-align: left;
            list-style: none;
            background-color: #fff;
            /* Set the background color */
            border: 1px solid rgba(0, 0, 0, .15);
            border-radius: .25rem;
            box-shadow: 0 .5rem 1rem rgba(0, 0, 0, .175);
            font-family: 'Inter', sans-serif;
            /* Set the Inter font */
        }

        .dropdown-menu a {
            display: block;
            padding: .5rem 1rem;
            text-decoration: none;
            color: #000;
            /* Set the text color */
        }

        .dropdown-menu a:hover {
            background-color: #f8f9fa;
            /* Set the background color on hover */
        }

        .container img {
            max-width: 100%;
            height: auto;
            display: block;
            margin: 0 auto;
            /* Center the image */
        }

        .desktop-1-Mss {
            background-color: #333;
            color: #fff;
            padding: 10px;
        }

        .auto-group-39fb-PpZ {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .vector-zxm {
            width: 50px;
            height: auto;
        }

        .navbar-43-WRK {
            display: flex;
            align-items: center;
        }

        .auto-group-zq2d-y41 {
            display: flex;
            align-items: center;
        }

        .frame-63-hVo {
            display: flex;
            align-items: center;
        }

        .frame-64-3Zf {
            display: flex;
            align-items: center;
            margin-right: 20px;
        }

        .raphael-books-XNM {
            width: 30px;
            height: auto;
            margin-right: 10px;
        }

        .media-ilmu-pcM,
        .catalog-JGd,
        .delivery-R6M,
        .delivery-LUD {
            margin: 0;
            padding: 0;
            margin-right: 20px;
            color: #fff;
            text-decoration: none;
        }

        .frame-65-5Au {
            display: flex;
            align-items: center;
        }

        .ellipse-1-Nvh {
            width: 30px;
            height: 30px;
            border-radius: 50%;
            background-color: #fff;
            margin-right: 10px;
        }

        .delivery-1Ts {
            margin: 0;
            padding: 0;
            margin-right: 10px;
            color: #fff;
        }

        .iconamoon-arrow-up-2-light-jem {
            width: 20px;
            height: auto;
        }


        /* Added styles for the genre text box */
        .genre-box {
            display: inline-block;
            padding: 0.5rem 1rem;
            border-radius: 0.25rem;
            color: #2D2E2E;
            /* Set text color to white */
        }

        /* Added styles for genre colors */
        .fiction {
            background-color: #DDFEDF;
            /* Green for Fiction */
        }

        .mistery {
            background-color: #FDEFD7;
            /* Yellow for Mystery */
        }

        .biographic {
            background-color: #E7DEFB;
            /* Purple for Biography */
        }

        .navbar-nav .nav-link {
            outline: none;
        }

        .navbar-nav .nav-item.active a {
            color: blue;
            font-weight: bold;
        }

        .card {
            height: 100%;
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
            float: right;
            /* Set text color to white */
        }
    </style>
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">
                    <img src="./assets/raphael-books-rfw.png" alt="Logo" width="30" height="24" class="d-inline-block align-text-top">
                    Media Ilmu
                </a>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav text-center"> <!-- Added text-center class here -->
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="<?= base_url('#') ?>">Dashboard</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="<?= base_url('./books_users') ?>">Books</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="<?= base_url('./chart_users') ?>">Cart</a>
                        </li>
                    </ul>
                </div>

                <div class="dropdown">
                    <img src="./assets/ellipse-1-bg-eyb.png" alt="Logo" width="30" height="24" class="d-inline-block align-text-top">
                    <button class="btn btn-white dropdown-toggle" type="button" id="dropdownDemosButton" data-bs-toggle="dropdown" aria-expanded="false">
                        Melanie Refman
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownDemosButton">
                        <li><a class="dropdown-item" href="<?= base_url('./welcome') ?>">Log Out</a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <div class="container mt-4">
        <img src="./assets/Group 6.png" class="img-fluid" width="100%"><br>
        <h3>Recommended:</h3>
    </div>

    <div class="container">
        <div class="row" id="result"></div>
    </div>

    <script>
        window.addEventListener('load', function() {
            const apiUrl = "https://api.sheety.co/72fd33f2649a4fd0f5082c032f82dcc8/dbbookstore/dbbookstore";

            fetch(apiUrl)
                .then(response => response.json())
                .then(function(data) {
                    const cardContainer = document.getElementById("result");

                    data.dbbookstore.forEach(book => {
                        const card = document.createElement('div');
                        card.classList.add('col-4', 'col-md-2', 'mb-3');

                        // Determine the genre class for styling
                        const genreClass = book.genre.toLowerCase().replace(' ', '-');

                        // Limit the title to the first three words
                        const limitedTitle = book.title.split(' ').slice(0, 3).join(' ');

                        // Limit the author to the first two words
                        const limitedAuthor = book.author.split(' ').slice(0, 2).join(' ');

                        card.innerHTML = `
                        <div class="card shadow">
                            <img src="${book.img}" class="card-img-top" alt="${book.title}">
                            <div class="card-body">
                                <h6 class="genre-box ${genreClass}" style="border-radius: 12px;">${book.genre}</h6>  
                                <p class="card-title">${limitedTitle}...</p>
                                <h6 class="card-text">${limitedAuthor}</h6>
                                <p class="card-text">${book.price}</p>
                            </div>
                        </div>
                    `;
                        cardContainer.appendChild(card);
                    });
                })
                .catch(error => {
                    alert("Terjadi kesalahan dalam mengambil data");
                });
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>

</html>