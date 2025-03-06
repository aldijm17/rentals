<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Document</title>
</head>
<body>
<div class="container d-flex justify-content-center align-items-center vh-100">
    <div class="card text-center shadow-lg p-4">
        <div class="card-body">
            <h2 class="text-success fw-bold">Terima Kasih!</h2>
            <p class="mt-3 fs-5">Hei, Terima kasih sudah menyewa sepeda kami. Tunggu sebentar ya!!</p>
            <a href="{{ route('home.guest') }}" class="btn btn-secondary mt-3">Kembali ke Halaman Utama</a>
        </div>
    </div>
</div>
</body>
</html>