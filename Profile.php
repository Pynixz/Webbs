<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=5.0">
    <title>Webs</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">

    <style>
        /* Style untuk bagian Data */
        .data-section table {
            width: 100%;
            border-collapse: collapse;
        }
        .data-section table, .data-section th, .data-section td {
            border: 1px solid #ccc;
        }
        .data-section th, .data-section td {
            padding: 10px;
            text-align: left;
        }
        .data-section .btn {
            margin: 5px;
        }
        /* Gaya untuk bagian About Me */
        .about-section {
            background-color:rgba(248, 249, 250, 0); /* Warna latar belakang */
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0);
        }

        .about-section h2 {
            color:rgb(255, 255, 255); /* Warna teks judul */
        }

        /* Gaya untuk bagian About Me */
        .about-section p {
            font-size: 1.2rem;
            line-height: 1.5;
            background-image: linear-gradient(to right, rgba(99, 156, 255, 0.92), rgba(255, 255, 255, 0.85)); /* Gradient dari biru ke merah muda */
            -webkit-background-clip: text; /* Memotong latar belakang hanya di area teks */
            color: transparent; /* Membuat teks transparan agar gradient terlihat */
        }
        .about-section img {
            border-radius: 10px;
            border: 5px Solid rgb(26, 35, 44); /* Warna border gambar */
        }
        .about-section {
            background-color:rgba(248, 249, 250, 0); /* Warna latar belakang */
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0px 4px 15px rgba(0, 0, 0, 0.1); /* Efek bayangan di sekitar About Me */
        }

                .about-section h2 {
            color: rgb(255, 255, 255); /* Warna teks judul */
            text-shadow: 2px 2px 4px rgba(35, 138, 248, 0.83), 0px 0px 25px rgba(25, 82, 255, 0.7);
        }


        /* Gaya untuk bagian About Me */
        .about-section p {
            font-size: 1.2rem;
            line-height: 1.5;
            background-image: linear-gradient(to right, rgba(99, 156, 255, 0.92), rgba(255, 255, 255, 0.85)); /* Gradient dari biru ke merah muda */
            -webkit-background-clip: text; /* Memotong latar belakang hanya di area teks */
            color: transparent; /* Membuat teks transparan agar gradient terlihat */
            border: 2px solid rgba(255, 255, 255, 0.9); /* Border dengan warna biru */
            border-radius: 8px; /* Radius border untuk memberikan efek rounded */
            padding: 10px; /* Memberikan jarak di dalam deskripsi */
            margin-top: 15px; /* Memberikan jarak atas pada deskripsi */
        }

        /* Gaya Latar Belakang Video */
        body {
            margin: 0;
            overflow-y: scroll;
            height: 100vh;
            padding-top: 60px;
            font-family: "Times New Roman", Times, serif;
        }
        .background-video {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
            z-index: -1;
        }
        .overlay {
            background-color: rgba(255, 255, 255, 0);
            min-height: 100vh;
        }
        .navbar-nav .nav-link {
            background-image: linear-gradient(to right,rgb(255, 255, 255),rgb(123, 191, 254)); /* Warna gradient */
            -webkit-background-clip: text;
            color: transparent;
            font-weight: bold; /* Optional, to make the text bolder */
        }
        nav.fixed-top {
            box-shadow: 0px 4px 6px rgba(79, 145, 192, 0.73);
        }
        .nav-link.active {
            position: relative;
            animation: bounce 0.5s ease;
        }
        @keyframes bounce {
            0%, 100% {
                transform: translateY(0);
            }
            50% {
                transform: translateY(-5px);
            }
        }
        .welcome-text {
            font-size: 5rem; /* Mengatur ukuran font */
            color:rgb(248, 248, 248); /* Mengatur warna font (contoh: hijau) */
            font-weight: bold; /* Membuat teks menjadi tebal */
            text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.72); /* Memberikan efek bayangan pada teks */
       }

    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <div class="container">
            <a class="navbar-brand" href="#">69</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#" onclick="activateLink(this); loadProfileSection();">Profile</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" onclick="activateLink(this); loadAboutSection();">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" onclick="activateLink(this); loadDataSection();">Data</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Video Latar Belakang -->
    <video class="background-video" autoplay loop muted>
        <source src="Video2.mp4" type="video/mp4">
        Browser Anda tidak mendukung pemutaran video.
    </video>

    <div class="overlay">
        <div class="container py-5" id="contentSection">
            <!-- Konten akan dimuat di sini -->
        </div>
    </div>

    <!-- Bootstrap Bundle JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        let userProfile = {
            name: "Dhiyaulhaq Al Maududi",
            email: "dhiyaulul@gmail.com",
            picture: "Paimon.jpg"
        };

        function displayProfile() {
            document.getElementById('profileNameDisplay').textContent = userProfile.name;
            document.getElementById('profileEmailDisplay').textContent = userProfile.email;
            document.querySelector('.card-body img').src = userProfile.picture;
        }

        function viewProfileImage() {
            const imageModal = ` 
                <div class="modal fade" id="viewImageModal" tabindex="-1" aria-labelledby="viewImageModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="viewImageModalLabel">Image view</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body text-center">
                                <img src="${userProfile.picture}" alt="Gambar Profil" class="img-fluid" style="max-width: 100%; max-height: 400px; object-fit: cover;">
                            </div>
                        </div>
                    </div>
                </div>
            `;
            document.body.insertAdjacentHTML('beforeend', imageModal);
            const modal = new bootstrap.Modal(document.getElementById('viewImageModal'));
            modal.show();
        }

        function loadProfileSection() {
            const profileSection = `
                <div class="card mb-4 shadow">
                    <div class="card-body text-center">
                        <img src="${userProfile.picture}" alt="Foto Profil" class="rounded-circle mb-3" style="width: 120px; height: 120px; object-fit: cover;">
                        <h3 class="h5 mb-2" style="color: black;" id="profileNameDisplay">Nama Pengguna</h3>
                        <p class="text-muted" style="color: black;" id="profileEmailDisplay">email@example.com</p>
                        <button onclick="viewProfileImage()" class="btn btn-info btn-sm">View</button>
                    </div>
                </div>
                <div class="text-center mt-4">
                    <p class="welcome-text">Welcome to My Website</p>
                </div>
            `;
            document.getElementById('contentSection').innerHTML = profileSection;
            displayProfile();
        }

        function loadAboutSection() {
            const aboutSection = `
                <div class="about-section row align-items-center">
                    <div class="col-md-6">
                        <h2 class="mb-4">About Me</h2>
                        <p>
                            Saya adalah mahasiswa IT angkatan 2023 yang selalu bersemangat mengeksplorasi dunia teknologi dan pemrograman.
                            Dalam perjalanan belajar saya, saya menemukan bahwa kecerdasan buatan (AI) adalah alat yang sangat berharga untuk mendampingi proses pemrograman.
                            Dengan AI sebagai asisten, saya dapat mengoptimalkan efisiensi dalam coding dan memecahkan masalah dengan lebih cepat.
                            Saya percaya bahwa penggabungan kemampuan manusia dan teknologi akan membawa hasil yang lebih inovatif dan berdampak positif di dunia digital.
                        </p>
                    </div>
                    <div class="col-md-6 text-center">
                        <img src="Paimon.jpg" alt="Gambar About Me" style="width: 15rem; height: 15rem; object-fit: cover; border-radius: 10px;">
                    </div>
                </div>
            `;
            document.getElementById('contentSection').innerHTML = aboutSection;
        }

        let dataList = [];
        let editIndex = -1; // Untuk menyimpan index data yang sedang diedit

        function updateTable() {
            const tableBody = document.getElementById('dataTable');
            tableBody.innerHTML = '';
            dataList.forEach((item, index) => {
                const row = document.createElement('tr');
                row.innerHTML = `
                    <td style="color:rgb(201, 201, 201);">${index + 1}</td> <!-- Font color for table cell -->
                    <td style="color:rgb(252, 252, 252);">${item.name}</td> <!-- Font color for table cell -->
                    <td style="color:rgb(255, 255, 255);">${item.element}</td> <!-- Font color for table cell -->
                    <td style="color:rgb(174, 199, 129);">${item.region}</td> <!-- Font color for table cell -->
                    <td style="color:rgb(252, 35, 35);">${item.weapon}</td> <!-- Font color for table cell -->
                    <td>
                        <button class="btn btn-warning btn-sm" onclick="editData(${index})">Edit</button>
                        <button class="btn btn-danger btn-sm" onclick="deleteData(${index})">Hapus</button>
                    </td>
                `;
                tableBody.appendChild(row);
            });
        }

        function loadDataSection() {
            const dataSection = `
                <div class="data-section">
                    <h2 style="color: #FF5733;">Manage Data</h2> <!-- Font color for heading -->
                    <form id="dataForm">
                        <div class="mb-3">
                            <label for="name" class="form-label" style="color:rgb(255, 255, 255);">Nama Character</label> <!-- Font color for label -->
                            <input type="text" class="form-control" id="name" required>
                        </div>
                        <div class="mb-3">
                            <label for="element" class="form-label" style="color:rgb(255, 255, 255);">Element</label> <!-- Font color for label -->
                            <select class="form-select" id="element" required>
                                <option value="Aero">Aero</option>
                                <option value="Electro">Electro</option>
                                <option value="Fusion">Fusion</option>
                                <option value="Glacio">Glacio</option>
                                <option value="Havoc">Havoc</option>
                                <option value="Spectro">Spectro</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="region" class="form-label" style="color:rgb(255, 255, 255);">Region</label> <!-- Font color for label -->
                            <select class="form-select" id="region" required>
                                <option value="Huang Long">Huang Long</option>
                                <option value="Black Shores">Black Shores</option>
                                <option value="Ranascita">Ranascita</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="weapon" class="form-label" style="color:rgb(255, 255, 255);">Weapon</label> <!-- Font color for label -->
                            <select class="form-select" id="weapon" required>
                                <option value="Sword">Sword</option>
                                <option value="BoardBlade">BoardBlade</option>
                                <option value="Pistols">Pistols</option>
                                <option value="Gauntlets">Gauntlets</option>
                                <option value="Rectifier">Rectifier</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">${editIndex === -1 ? 'Tambah Data' : 'Update Data'}</button>
                    </form>
                    <table class="table table-dark mt-4">
                        <thead>
                            <tr>
                                <th style="color: #FFEB3B;">No</th> <!-- Font color for table header -->
                                <th style="color: #FFEB3B;">Nama Character</th> <!-- Font color for table header -->
                                <th style="color: #FFEB3B;">Element</th> <!-- Font color for table header -->
                                <th style="color: #FFEB3B;">Region</th> <!-- Font color for table header -->
                                <th style="color: #FFEB3B;">Weapon</th> <!-- Font color for table header -->
                                <th style="color: #FFEB3B;">Data</th> <!-- Font color for table header -->
                            </tr>
                        </thead>
                        <tbody id="dataTable"></tbody>
                    </table>
                </div>
                
            `;
            document.getElementById('contentSection').innerHTML = dataSection;

            document.getElementById('dataForm').addEventListener('submit', function(event) {
                event.preventDefault();
                const name = document.getElementById('name').value;
                const element = document.getElementById('element').value;
                const region = document.getElementById('region').value;
                const weapon = document.getElementById('weapon').value;
                if (name && element && region && weapon) {
                    if (editIndex === -1) {
                        dataList.push({ name, element, region, weapon });
                    } else {
                        dataList[editIndex] = { name, element, region, weapon };
                        editIndex = -1;
                    }
                    updateTable();
                    document.getElementById('dataForm').reset();
                }
            });
            updateTable();
        }
        function editData(index) {
            const item = dataList[index];
            document.getElementById('name').value = item.name;
            document.getElementById('element').value = item.element;
            document.getElementById('region').value = item.region;
            document.getElementById('weapon').value = item.weapon;
            editIndex = index;
        }
        function deleteData(index) {
            dataList.splice(index, 1);
            updateTable();
        }
        function activateLink(link) {
            const links = document.querySelectorAll('.nav-link');
            links.forEach(item => item.classList.remove('active'));
            link.classList.add('active');
        }
        loadProfileSection();
    </script>
        <!-- FOOTER --->
    <footer class="footer text-white py-3 text-center mt-4">
        <span>© 2025 MyWebsite. All rights reserved. | <a href="#" class="text-white text-decoration-underline">Privacy Policy</a></span>
    </footer>
</body>
</html>
