<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WebCRUD</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">

    <!-- Gaya Latar Belakang Video -->
    <style>
        body {
            margin: 0;
            /* Hapus overflow hidden agar bisa scroll */
            overflow-y: scroll; /* Atur agar hanya scroll vertikal */
            height: 100vh;
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
            background-color: rgba(255, 255, 255, 0); /* Transparansi overlay */
            min-height: 100vh;
        }
    </style>
</head>
<body>
    <!-- Video Latar Belakang -->
    <video class="background-video" autoplay loop muted>
        <source src="Video2.mp4" type="video/mp4">
        Browser Anda tidak mendukung pemutaran video.
    </video>

    <div class="overlay">
        <div class="container py-5">
            <!-- Header Section -->
            <div class="text-center mb-4">
                <h1 class="display-4 fw-bold" style="color: White;">Welcome to my website</h1>
                <p class="lead text-bold" style="color: White;">Kelola Menu Anda</p>
            </div>

            <!-- Profile Section -->
            <div class="card mb-4 shadow">
                <div class="card-body text-center">
                    <img src="https://via.placeholder.com/120" alt="Foto Profil" class="rounded-circle mb-3" style="width: 120px; height: 120px; object-fit: cover;">
                    <h3 class="h5 mb-2" style="color: black;" id="profileNameDisplay">Nama Pengguna</h3>
                    <p class="text-muted" style="color: black;" id="profileEmailDisplay">email@example.com</p>
                    <button onclick="editProfile()" class="btn btn-primary btn-sm">Edit Profil</button>
                </div>
            </div>

            <!-- Modal Edit Profil -->
            <div class="modal fade" id="editProfileModal" tabindex="-1" aria-labelledby="editProfileLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="editProfileLabel">Edit Profil</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form id="profileForm">
                                <div class="mb-3">
                                    <label for="profileName" class="form-label">Nama</label>
                                    <input type="text" id="profileName" class="form-control" required>
                                </div>
                                <div class="mb-3">
                                    <label for="profileEmail" class="form-label">Email</label>
                                    <input type="email" id="profileEmail" class="form-control" required>
                                </div>
                                <div class="mb-3">
                                    <label for="profilePicture" class="form-label">Foto Profil</label>
                                    <input type="file" id="profilePicture" class="form-control" accept="image/*">
                                </div>
                                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Form Section -->
            <div class="card mb-4 shadow">
                <div class="card-body">
                    <h2 class="h5 mb-4">Tambah/Edit Menu</h2>
                    <form id="menuForm">
                        <input type="hidden" id="menuId" name="menuId">
                        <div class="mb-3">
                            <label for="menuName" class="form-label">Nama Menu</label>
                            <input type="text" id="menuName" class="form-control" required placeholder="Masukkan nama menu">
                        </div>
                        <div class="mb-3">
                            <label for="menuPrice" class="form-label">Harga</label>
                            <input type="number" id="menuPrice" class="form-control" required placeholder="Masukkan harga menu">
                        </div>
                        <div class="mb-3">
                            <label for="menuOrigin" class="form-label">Asal Daerah</label>
                            <input type="text" id="menuOrigin" class="form-control" required placeholder="Masukkan asal daerah">
                        </div>
                        <div class="mb-3">
                            <label for="menuDescription" class="form-label">Deskripsi</label>
                            <textarea id="menuDescription" class="form-control" rows="4" required placeholder="Masukkan deskripsi menu"></textarea>
                        </div>
                        <div class="d-flex justify-content-end gap-3">
                            <button type="button" onclick="resetForm()" class="btn btn-secondary">Batal</button>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Table Section -->
            <div class="card shadow">
                <div class="card-body">
                    <h2 class="h5 mb-4">Daftar Menu</h2>
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead class="table-light">
                                <tr>
                                    <th>Nama Menu</th>
                                    <th>Harga</th>
                                    <th>Asal Daerah</th>
                                    <th>Deskripsi</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody id="menuTableBody">
                                <!-- Data akan diisi melalui JavaScript -->
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap Bundle JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Script JavaScript -->
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

        function editProfile() {
            document.getElementById('profileName').value = userProfile.name;
            document.getElementById('profileEmail').value = userProfile.email;
            new bootstrap.Modal(document.getElementById('editProfileModal')).show();
        }

        document.getElementById('profileForm').addEventListener('submit', function (e) {
            e.preventDefault();

            userProfile.name = document.getElementById('profileName').value;
            userProfile.email = document.getElementById('profileEmail').value;

            const fileInput = document.getElementById('profilePicture');
            if (fileInput.files[0]) {
                const reader = new FileReader();
                reader.onload = function (e) {
                    userProfile.picture = e.target.result;
                    displayProfile();
                };
                reader.readAsDataURL(fileInput.files[0]);
            } else {
                displayProfile();
            }

            const modal = bootstrap.Modal.getInstance(document.getElementById('editProfileModal'));
            modal.hide();
        });

        // Menu Data Logic
        let menus = [
            { id: 1, name: 'Rendang', price: 45000, origin: 'Padang', description: 'Daging sapi yang dimasak dengan rempah-rempah khas Padang' },
            { id: 2, name: 'Soto Betawi', price: 35000, origin: 'Jakarta', description: 'Sup daging sapi dengan kuah santan khas Betawi' }
        ];

        function displayMenuData() {
            const tableBody = document.getElementById('menuTableBody');
            tableBody.innerHTML = '';

            menus.forEach(menu => {
                const row = `
                    <tr>
                        <td>${menu.name}</td>
                        <td>Rp ${menu.price.toLocaleString()}</td>
                        <td>${menu.origin}</td>
                        <td>${menu.description}</td>
                        <td>
                            <button onclick="editMenu(${menu.id})" class="btn btn-link text-primary p-0"><i class="fas fa-edit"></i> Edit</button>
                            <button onclick="deleteMenu(${menu.id})" class="btn btn-link text-danger p-0"><i class="fas fa-trash"></i> Hapus</button>
                        </td>
                    </tr>
                `;
                tableBody.innerHTML += row;
            });
        }

        function resetForm() {
            document.getElementById('menuId').value = '';
            document.getElementById('menuForm').reset();
        }

        function editMenu(id) {
            const menu = menus.find(m => m.id === id);
            if (menu) {
                document.getElementById('menuId').value = menu.id;
                document.getElementById('menuName').value = menu.name;
                document.getElementById('menuPrice').value = menu.price;
                document.getElementById('menuOrigin').value = menu.origin;
                document.getElementById('menuDescription').value = menu.description;
            }
        }

        function deleteMenu(id) {
            if (confirm('Apakah Anda yakin ingin menghapus menu ini?')) {
                menus = menus.filter(menu => menu.id !== id);
                displayMenuData();
            }
        }

        document.getElementById('menuForm').addEventListener('submit', function(e) {
            e.preventDefault();

            const formData = {
                id: document.getElementById('menuId').value,
                name: document.getElementById('menuName').value,
                price: parseInt(document.getElementById('menuPrice').value),
                origin: document.getElementById('menuOrigin').value,
                description: document.getElementById('menuDescription').value
            };

            if (formData.id) {
                const index = menus.findIndex(m => m.id === parseInt(formData.id));
                if (index !== -1) {
                    menus[index] = { ...menus[index], ...formData };
                }
            } else {
                const newId = menus.length > 0 ? Math.max(...menus.map(m => m.id)) + 1 : 1;
                menus.push({ ...formData, id: newId });
            }

            displayMenuData();
            resetForm();
        });

        displayProfile();
        displayMenuData();
    </script>
</body>
</html>
