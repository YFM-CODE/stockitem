<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $judul_halaman; ?></title>
    <style>
        body { font-family: Arial, sans-serif; margin: 40px; background-color: #f4f6f9; color: #333; }
        .container { background: #fff; padding: 30px; border-radius: 8px; box-shadow: 0 4px 6px rgba(0,0,0,0.1); }
        h1 { color: #2c3e50; }
        .status { color: #27ae60; font-weight: bold; }
    </style>
</head>
<body>
    <div class="container">
        <h1><?= $judul_halaman; ?></h1>
        <p><?= $pesan_selamat; ?></p>
        <p>Status Sistem: <span class="status">Mesin MVC Native & MySQLi OOP Berjalan Sukses! 🎯</span></p>
    </div>
</body>
</html>
